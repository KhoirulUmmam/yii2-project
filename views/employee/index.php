<?php

use yii\helpers\Html;
use yii\bootstrap5\LinkPager;

?>


<h1>DAFTAR EMPLOYEE</h1>
<br>
<?php echo Html::a('Tambah Data', ['employee/create'], ['class' => 'btn btn-success']) ?>
<br>
<br>
<table class="table table-bordered table-striped" width="100%">
    <tr>
        <th style="width: 5%;">NO</th>
        <th style="width: 5%;">ID</th>
        <th>NAME</th>
        <th>ADDRESS</th>
        <th>AGE</th>
        <th style="width: 20%;">ACTION</th>
    </tr>
    <?php
    $no = 0;
    foreach ($employees as $data) {

        $no++;
    ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data->ID; ?></td>
            <td><?= $data->NAME; ?></td>
            <td><?= $data->ADDRESS; ?></td>
            <td><?= $data->AGE; ?></td>
            <td>
                <?php echo Html::a('<button class="btn btn-warning"><span class="text-dark">Ubah</span></button>', ['employee/update', 'ID' => $data->ID]) ?>
                <?php echo Html::a('<button class="btn btn-danger"><span class="text-dark">Hapus</span></button>', ['employee/delete', 'ID' => $data->ID], ['onclick' => 'return (confirm("Anda yakin ingin menghapus data ?") ? true : false);']) ?>
            </td>
        </tr>
    <?php } ?>
</table>
<?php

echo LinkPager::widget([
'pagination' => $pagination,
]);

?>
