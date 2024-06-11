<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TagihanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tagihan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'diagnosaPenyakit') ?>

    <?= $form->field($model, 'id_tindakan') ?>

    <?= $form->field($model, 'id_obat') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?php $form->field($model, 'totalTagihan') ?>

    <?php $form->field($model, 'id_tagihan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
