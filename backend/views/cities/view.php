<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="city-view">

    <h1><?= Html::encode($model->city) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'city',
            'countryId',
            'capital',
        ],
    ]) ?>

</div>