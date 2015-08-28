<h1>Редактирование краски #<?= $paint['id'] ?>:</h1>
<br>
<form action="#" method="post">
    <div class="form-group">
        <label for="id-name">Наименование</label>
        <input type="text" name="name" id="id-name" value="<?= $paint['name'] ?>">
    </div>
    <input type="hidden" name="id" value="<?= $paint['id'] ?>">
    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
</form>
