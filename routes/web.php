<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/add', [Controller\Site::class, 'add']);
Route::add(['GET', 'POST'], '/distribution', [Controller\Site::class, 'distribution']);
Route::add(['GET', 'POST'], '/addendum', [Controller\Site::class, 'addendum']);
Route::add(['GET', 'POST'], '/author', [Controller\Site::class, 'author']);
Route::add(['GET', 'POST'], '/copy', [Controller\Site::class, 'copy']);
Route::add('GET', '/selection', [Controller\Site::class, 'selection']);
Route::add('GET', '/copies', [Controller\Site::class, 'copies']);



