<?php

namespace Controller;

use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;

class Site
{

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
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

    public function add(): string
    {
        return new View('site.add', ['message' => 'hello working']);
    }

    public function distribution(): string
    {
        return new View('site.distribution', ['message' => 'hello working']);
    }

    public function addendum(): string
    {
        return new View('site.addendum', ['message' => 'hello working']);
    }

    public function selection(): string
    {
        return new View('site.selection', ['message' => 'hello working']);
    }

    public function copies(): string
    {
        return new View('site.copies', ['message' => 'hello working']);
    }

}
