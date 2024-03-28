<div class="copies-book">
    <h1>Список копий книг</h1>
    <ol class="copies-list">
        <?php
        foreach ($posts as $post) {
            echo '<li><h1>' . $post->title . '</h1></li>';
        }
        ?>
    </ol>
</div>
