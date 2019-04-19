<?php

use backend\controllers\CountryController;
use common\components\MPView;
use common\models\Countries\Country;
use yii\helpers\Html;

?>

<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>