<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
    <link rel="stylesheet" href="public/css/style.css">

</head>
<body style=" margin: 0; padding: 0;">
<header class="header">
    <nav class="nav">
        <a class="nav_home" href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
        <?php
        if (!app()->auth::check()):
            ?>
            <a class="nav_home" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
            <a class="nav_home" href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
            <a class="nav_home" href="<?= app()->route->getUrl('/addendum') ?>">Добавить читателя</a>
            <a class="nav_home" href="<?= app()->route->getUrl('/distribution') ?>">Выдача книг</a>
            <a class="nav_home" href="<?= app()->route->getUrl('/selection') ?>">Выбор книг и читателя</a>
            <a class="nav_home" href="<?= app()->route->getUrl('/copies') ?>">Список копий</a>
        <?php
        else:
            ?>
            <ul>
                <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
            </ul>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <div class="content">
        <a class="nav_home" href="<?= app()->route->getUrl('/add') ?>">Добление книги</a>
        <?= $content ?? '' ?>
    </div>
</main>

</body>
</html>