<h1>Перемещение в цех</h1>
<br>
<form action="#" method="post">
    <div class="form-group">
        <label for="id-consignment">Партия</label>
        <select name="consignment" id="id-consignment">
            <option></option>
            <?php foreach ($consignments as $consignment): ?>
                <option value=<?= $consignment['id'] ?>><?= $consignment['name'] . '{ ' . $consignment['paint'] . ' }' ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="id-stock">Место на складе</label>
        <select name="stock" id="id-stock">
            <option></option>
            <?php foreach ($places as $place): ?>
                <?php if ($place['id_warehouse'] == 1): ?>
                    <option value=<?= $place['id'] ?>><?= $place['name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="id-workshop">Место в цеху</label>
        <select name="workshop" id="id-workshop">
            <option></option>
            <?php foreach ($places as $place): ?>
                <?php if ($place['id_warehouse'] == 2): ?>
                    <option value=<?= $place['id'] ?>><?= $place['name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="id-quantity">Количество</label>
        <input type="number" name="quantity" id="id-quantity">
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
