<h1>Перечень мест хранения:</h1>
<br>
<a href="index.php?c=place&a=new">Добавить новое место хранения</a>
<br>
<br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Наименование</th>
        <th>Склад</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($places as $place): ?>
        <tr>
            <td><?= $place['id'] ?></td>
            <td><?= $place['name'] ?></td>
            <td><?= $place['warehouse'] ?></td>
            <td><a href="index.php?c=place&a=edit&id=<?= $place['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
            <td><a href="index.php?c=place&a=delete&id=<?= $place['id'] ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
