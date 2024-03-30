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
<div style="display: flex; flex-direction: column">
    <?php
    if (!app()->auth::check()):
        ?>

    <?php
    else:
        if (app()->auth::user()->id_roles === 1):
            ?>
            <ul>
                <li><a href="<?= app()->route->getUrl('/signup') ?>">Добавить библиотекаря</a></li>
            </ul>

        <?php
        else:
            ?>
            <ul>
                <li><a href="<?= app()->route->getUrl('/add') ?>">Добление книги</a></li>
                <li><a href="<?= app()->route->getUrl('/addendum') ?>">Добавить читателя</a></li>
                <li><a href="<?= app()->route->getUrl('/copy') ?>">Добление копии</a></li>
                <li><a href="<?= app()->route->getUrl('/author') ?>">Добление автора</a></li>
                <li><a href="<?= app()->route->getUrl('/distribution') ?>">Выдача книг</a></li>
                <li><a href="<?= app()->route->getUrl('/selection') ?>">Выбор книг и читателя</a></li>
                <li><a href="<?= app()->route->getUrl('/copies') ?>">Список копий</a></li>
            </ul>
        <?php
        endif;
        ?>

    <?php
    endif;
    ?>
</div>

<main>
    <div class="content">
        <?= $content ?? '' ?>
    </div>
</main>

</body>
</html>