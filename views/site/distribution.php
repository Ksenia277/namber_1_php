<div class="copies">
    <h2>Выдача книг</h2>
    <p><?= $message?></p>
    <div class="signup">
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>читатель
                <select name="number_card">
                    <option value="">Выбрать читателя</option>
                    <?php foreach($readers as $reader): ?>
                        <option value="<?= $reader->getId() ?>"> <?= $reader->name ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Дата выдачи <input type="date" name="date_issue"></label>
            <label>Срок возврата <input type="date" name="return_period"></label>
            <label>Пользователь
                <select name="id_user">
                    <option value="">Выбрать пользователя</option>
                    <?php foreach($users as $user): ?>
                        <option value="<?= $user->getId() ?>"> <?= $user->name ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Копия
                <select name="id_copy">
                    <option value="">Выбрать копию</option>
                    <?php foreach($copys as $copy): ?>
                        <option value="<?= $copy->getId() ?>"> <?= $copy->name ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <button type="submit">Выдать книгу</button>
        </form>
    </div>
</div>