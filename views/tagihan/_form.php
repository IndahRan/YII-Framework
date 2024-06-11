<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tagihan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tagihan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'diagnosaPenyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tindakan')->textInput() ?>

    <?= $form->field($model, 'id_obat')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'totalTagihan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
