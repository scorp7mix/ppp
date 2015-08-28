<h1>Все движения:</h1>
<br>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Дата</th>
        <th>Партия</th>
        <th>Откуда</th>
        <th>Куда</th>
        <th>Количество</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($moves as $move): ?>
        <tr>
            <td><?= $move['id'] ?></td>
            <td><?= $move['date'] ?></td>
            <td><?= $move['consignment'] . ' { ' . $move['paint'] . ' }' ?></td>
            <td><?= $move['place1'] . ' { ' . $move['warehouse1'] . ' }' ?></td>
            <td><?= $move['place2'] . ' { ' . $move['warehouse2'] . ' }' ?></td>
            <td><?= $move['quantity'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
