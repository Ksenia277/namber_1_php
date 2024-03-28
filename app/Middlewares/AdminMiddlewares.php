<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminMiddlewares
{
    public function handle(Request $request)
    {
        //Если пользователь не авторизован, то редирект на страницу входа
        if (!Auth::admincheck()) {
            app()->route->redirect('/hello');
        }
    }
}
