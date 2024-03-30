<div class="copies-book">
    <h1>Список копий книг</h1>
    <ol class="copies-list">
        <?php foreach ($copys as $copy): ?>
            <p>название: <?= $copy->name?></p>
            <p>описание: <?= $copy->description?></p>
        <?php endforeach; ?>
    </ol>
</div>
