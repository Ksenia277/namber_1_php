<div class="copies">
    <h2>Добавление новой копии</h2>
    <p><?= $message ?></p>
    <div class="signup">
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>книга
                <select name="id_book">
                    <option value="">Выбрать книгу</option>
                    <?php foreach($books as $book): ?>
                        <option value="<?= $book->getId() ?>"> <?= $book->title_book ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Описание <input type="text" name="description"></label>
            <button>Добавить</button>
        </form>
    </div>
</div>