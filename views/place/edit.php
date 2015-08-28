<h1>Редактирование места хранения #<?= $place['id'] ?>:</h1>
<br>
<form action="#" method="post">
    <div class="form-group">
        <label for="id-name">Наименование</label>
        <input type="text" name="name" id="id-name" value="<?= $place['name'] ?>">
    </div>
    <div class="form-group">
        <label for="id-warehouse">Склад</label>
        <select name="warehouse" id="id-warehouse">
            <option></option>
            <option value="1" <?= ($place['warehouse'] == 'основной склад') ? 'selected' : '' ?>>основной склад</option>
            <option value="2" <?= ($place['warehouse'] == 'склад в цеху') ? 'selected' : '' ?>>склад в цеху</option>
        </select>
    </div>
    <input type="hidden" name="id" value="<?= $place['id'] ?>">
    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
</form>
