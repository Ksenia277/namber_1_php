<div class="copies">
    <h2>Просмотр книги и читателя</h2>
</div>
<div style="
    display: flex;
    justify-content: center;
    gap: 118px;">
    <div>
        <?php foreach ($readers as $reader): ?>
            <div class="book-reader-info">
                <img src="public/<?= $reader->image ?>" alt="Photo" width="100" height="100">
                <div class="book-reader-info-field">
                    <span>Книга:</span>
                    <span id="book-name">
                        <?= $reader->id_copy ?>
                    </span>
                </div>
                <div class="book-reader-info-field">
                    <span>Читатель:</span>
                    <span id="reader-fio">
                        <?= $reader->number_card ?>
                    </span>
                </div>
                <div class="book-reader-info-field">
                    <span>Дата выдачи:</span>
                    <span id="issue-date">
                        <?= $reader->date_issue ?>
                    </span>
                </div>
                <div class="book-reader-info-field">
                    <span>Дата сдачи:</span>
                    <span id="return-date">
                        <?= $reader->return_period ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="container">
        <div class="container_1">
            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <select name="reader_id" placeholder="Читатель">
                    <option value="">Выберите читателя</option>
                    <?php
                    foreach ($allReaders as $reader) {
                        echo '<option value="' . $reader->id . '">' . $reader->name . '</option>';
                    }
                    ?>
                </select>
                <button type="submit">Выбрать</button>
            </form>
        </div>
    </div>
</div>