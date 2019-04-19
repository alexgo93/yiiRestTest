<?php

use backend\controllers\CitiesController;
use common\components\MPView;
use common\models\Cities\City;
use yii\helpers\Html;

?>

<div class="city-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>