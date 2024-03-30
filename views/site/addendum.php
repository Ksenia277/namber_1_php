<div class="copies">
    <h2>Добавление нового читателя</h2>
    <p><?= $message ?></p>
    <div class="signup">
        <form method="post" enctype="multipart/form-data">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Фамилия <input type="text" name="surname"></label>
            <label>Имя <input type="text" name="name"></label>
            <label>Отчество <input type="text" name="middlename"></label>
            <label>Адрес читателя <input type="text" name="address"></label>
            <label>Телефон читателя <input type="tel" name="phone"></label>
            <label>Изображение <input type="file" name="image"></label>
            <button>Добавить</button>
        </form>
    </div>
</div>