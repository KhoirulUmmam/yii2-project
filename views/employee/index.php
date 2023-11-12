<?php
use yii\helpers\Html;
?>


<h1>DAFTAR EMPLOYEE</h1>

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>ADDRESS</th>
        <th>AGE</th>
    </tr>
    <?php foreach ($employees as $data) { ?>
        <tr>
            <td><?= $data->ID; ?></td>
            <td><?= $data->NAME; ?></td>
            <td><?= $data->ADDRESS; ?></td>
            <td><?= $data->AGE; ?></td>
            <td><?php echo Html::a('Edit', ['employee/update', 'ID' => $data->ID]) ?></td>
        </tr>
    <?php } ?>
</table>