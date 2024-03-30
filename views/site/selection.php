<div class="copies">
    <h2>Выбор книги и читателя</h2>
</div>
<?php foreach($readers as $reader): ?>
    <div class="book-reader-info">
        <img src="public/<?= $reader->image ?>" alt="Photo" width="100" height="100">
        <div class="book-reader-info-field">
            <span>Книга:</span>
            <span id="book-name"><?= $reader->id_copy?></span>
        </div>
        <div class="book-reader-info-field">
            <span>Читатель:</span>
            <span id="reader-fio"><?= $reader->number_card?></span>
        </div>
        <div class="book-reader-info-field">
            <span>Дата выдачи:</span>
            <span id="issue-date"><?= $reader->date_issue ?></span>
        </div>
        <div class="book-reader-info-field">
            <span>Дата сдачи:</span>
            <span id="return-date"><?= $reader->return_period ?></span>
        </div>
    </div>
<?php endforeach; ?>
</div>