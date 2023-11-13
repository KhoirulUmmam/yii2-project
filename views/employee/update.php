<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
?>

<h1>Employee</h1>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'NAME') ?>
<?= $form->field($model, 'ADDRESS') ?>
<?= $form->field($model, 'AGE') ?>
<?= Html::a('Kembali', ['index'], ['class' => 'btn btn-secondary', 'style' => 'margin-right: 5px;']) ?>
<?= Html::submitButton('Ubah', ['class' => 'btn btn-primary']) ?>

<?php $form = ActiveForm::end(); ?>
