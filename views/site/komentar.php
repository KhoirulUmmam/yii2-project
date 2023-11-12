<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Komentar</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'NAMA') ?>
<?= $form->field($model, 'PESAN') ?>
<?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>

<?php $form = ActiveForm::end(); ?>