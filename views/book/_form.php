<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Book $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TITLE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AUTHOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PUBLISHER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRICE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STOCK')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
