<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tindakan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tindakan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tindakan')->textInput() ?>

    <?= $form->field($model, 'namaTindakan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
