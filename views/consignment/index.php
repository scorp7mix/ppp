<h1>Перечень партий:</h1>
<br>
<a href="index.php?c=consignment&a=new">Добавить новую партию</a>
<br>
<br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Наименование</th>
        <th>Краска</th>
        <th>Срок годности</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($consignments as $consignment): ?>
        <tr>
            <td><?= $consignment['id'] ?></td>
            <td><?= $consignment['name'] ?></td>
            <td><?= $consignment['paint'] ?></td>
            <td><?= $consignment['date'] ?></td>
            <td><a href="index.php?c=consignment&a=edit&id=<?= $consignment['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
            <td><a href="index.php?c=consignment&a=delete&id=<?= $consignment['id'] ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
