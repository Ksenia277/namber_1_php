<div class="copies-book">
    <h1>Найти книгу</h1>
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label>поиск <input type="text" name="book"></label>
        <button>найти</button>
    </form>
    <ol class="copies-list">
        <?php foreach ($books as $book): ?>
            <p>название: <?= $book->title_book?></p>
        <?php endforeach; ?>
    </ol>
</div>
