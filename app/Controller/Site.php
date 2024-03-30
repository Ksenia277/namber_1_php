<?php

namespace Controller;

use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;
use Src\Validator\Validator;
use Model\Reader;
use Model\Author;
use Model\Book;
use Model\Copy;
use Model\Book_Distribution;

class Site
{

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function add(Request $request): string
    {
        $authors = Author::all();

        if($request->method === 'POST'){
            $validator = new Validator($request->all(), [
                'id_author' => ['required'],
                'title_book' => ['required'],
                'year_publication' => ['required'],
                'price' => ['required'],
                'brief_summary' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('site.add', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'authors' => $authors]);
            }

            $temp = $request->all();

            if (array_key_exists('new_not_edition', $temp)) {
                $temp['new_not_edition'] = 1;
            } else {
                $temp['new_not_edition'] = 0;
            }

            if(Book::create($temp)){
                app()->route->redirect('/add');
            }
        }

        return new View('site.add', ['message' => '', 'authors' => $authors]);
    }

    public function copy(Request $request): string
    {
        $books = Book::all();
        if($request->method === 'POST'){
            $validator = new Validator($request->all(), [
                'id_book' => ['required'],
                'description' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('site.copy', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'books' => $books]);
            }

            if(Copy::create($request->all())){
                app()->route->redirect('/copy');
            }
        }

        return new View('site.copy', ['message' => '','books' => $books]);
    }

    public function distribution(Request $request): string
    {
        $readers = Reader::all();
        $users = User::all();
        $copys = Copy::all();
        foreach($copys as $copy){
            $id = $copy->id_book;
            $bookname = Book::where('id_book', $id)->get();
            $copy->name = $bookname[0]->title_book;
        }

        if($request->method === 'POST'){
            $validator = new Validator($request->all(), [
                'number_card' => ['required'],
                'date_issue' => ['required'],
                'return_period' => ['required'],
                'id_user' => ['required'],
                'id_copy' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('site.distribution', ['message' =>  json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'readers' => $readers, 'users' => $users, 'copys' => $copys]);
            }

            if(Book_Distribution::create($request->all())){
                app()->route->redirect('/distribution');
            }
        }

        return new View('site.distribution', ['message' => '' , 'readers' => $readers, 'users' => $users, 'copys' => $copys]);
    }

    public function author(Request $request): string
    {
        if($request->method === 'POST'){
            $validator = new Validator($request->all(), [
                'surname' => ['required'],
                'name' => ['required'],
                'middlename' => ['required'],
            ] , [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('site.author', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if(Author::create($request->all())){
                app()->route->redirect('/author');
            }
        }
        return new View('site.author', ['message' => '']);
    }

    public function addendum(Request $request): string
    {
        if($request->method === 'POST'){
            $validator = new Validator($request->all(), [
                'surname' => ['required'],
                'name' => ['required'],
                'middlename' => ['required'],
                'address' => ['required'],
                'phone' => ['required'],
                'image' => ['required']
            ] , [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('site.addendum', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            $image = $request->all()['image'];
            $image_name = $image['name'];
            $image_tmp = $image['tmp_name'] ;
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);

            $new_path = 'uploads/';
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex;
            move_uploaded_file($image_tmp, $new_path . $new_img_name);

            $readerData = $request->all();
            $readerData['image'] = $new_path . $new_img_name;

            if(Reader::create($readerData)){
                app()->route->redirect('/addendum');
            }
        }

        return new View('site.addendum', ['message' => '']);
    }

    public function selection(): string
    {
        $readers = Book_Distribution::all();
        foreach($readers as $reader){
            $copies = Copy::where('id', $reader->id_copy)->get();
            foreach($copies as $copy){
                $book = Book::where('id_book', $copy->id_book)->get();
                $reader->id_copy = $book[0]->title_book;
            }

            $user = Reader::where('id', $reader->number_card)->get();
            $reader->number_card = $user[0]->name;
            $reader->image = $user[0]->image;
        }
        return new View('site.selection', ['message' => 'hello working' , 'readers' => $readers]);
    }

    public function poisk(Request $request): string
    {

        $books = Book::all();

        if($request->method === 'POST'){
            $temp = $request->all();
            $bookID = $temp['book'];
            $books = Book::where('title_book', 'LIKE', "%$bookID%")->get();
        }

        return new View('site.poisk', ['books' => $books]);
    }
}

