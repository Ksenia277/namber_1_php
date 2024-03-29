<div class="copies">
<h2>Добавление нового библиотекаря</h2>
<pre><?= $message ?? ''; ?></pre>
    <div class="signup">
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label>Имя <input type="text" name="name"></label>
        <label>Логин <input type="text" name="login"></label>
        <label>Пароль <input type="password" name="password"></label>
        <button>Добивить</button>
    </form>
    </div>
</div>


