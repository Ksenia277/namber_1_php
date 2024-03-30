<div class="copies">
    <h2>Добавление новой книги</h2>
    <p><?= $message ?></p>
    <div class="signup">
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Автор книги
                <select name="id_author">
                    <option value="">Выбрать автора</option>
                    <?php foreach($authors as $author): ?>
                        <option value="<?= $author->getId() ?>"> <?= $author->name ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Название <input type="text" name="title_book"></label>
            <label>Год издания <input type="number" name="year_publication"></label>
            <label>Цена <input type="number" name="price"></label>
            <label>Является ли новым изданием <input type="checkbox" name="new_not_edition"></label>
            <label>Краткая аннотация <textarea name="brief_summary"></textarea></label>
            <button>Добавить</button>
        </form>
    </div>
</div>