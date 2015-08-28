<h1>Добавление новой партии</h1>
<br>
<form action="#" method="post">
    <div class="form-group">
        <label for="id-name">Наименование</label>
        <input type="text" name="name" id="id-name">
    </div>
    <div class="form-group">
        <label for="id-paint">Краска</label>
        <select name="paint" id="id-paint">
            <option></option>
            <?php foreach ($paints as $paint): ?>
                <option value=<?= $paint['id'] ?>><?= $paint['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="id-date">Срок годности</label>
        <input type="date" name="date" id="id-date">
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
