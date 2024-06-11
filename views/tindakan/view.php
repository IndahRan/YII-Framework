<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tindakan $model */

$this->title = $model->id_tindakan;
$this->params['breadcrumbs'][] = ['label' => 'Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tindakan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_tindakan' => $model->id_tindakan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_tindakan' => $model->id_tindakan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tindakan',
            'namaTindakan',
            'id_pegawai',
            'id_pasien',
        ],
    ]) ?>

</div>
