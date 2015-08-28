<h1>Добавление нового места хранения</h1>
<br>
<form action="#" method="post">
    <div class="form-group">
        <label for="id-name">Наименование</label>
        <input type="text" name="name" id="id-name">
    </div>
    <div class="form-group">
        <label for="id-warehouse">Склад</label>
        <select name="warehouse" id="id-warehouse">
            <option></option>
            <option value="1">основной склад</option>
            <option value="2">склад в цеху</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
