<h1>Перечень красок:</h1>
<br>
<a href="index.php?c=paint&a=new">Добавить новую краску</a>
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($paints as $paint): ?>
        <tr>
            <td><?= $paint['id'] ?></td>
            <td><?= $paint['name'] ?></td>
            <td><a href="index.php?c=paint&a=edit&id=<?= $paint['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
            <td><a href="index.php?c=paint&a=delete&id=<?= $paint['id'] ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
