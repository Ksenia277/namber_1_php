<div class="copies">
    <h2>Добавление нового автора</h2>
    <p><?= $message ?></p>
    <div class="signup">
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Фамилия <input type="text" name="surname"></label>
            <label>Имя <input type="text" name="name"></label>
            <label>Отчество <input type="text" name="middlename"></label>
            <button>Добавить</button>
        </form>
    </div>
</div>