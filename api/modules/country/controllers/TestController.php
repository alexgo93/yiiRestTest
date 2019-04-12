<?php

namespace api\modules\country\controllers;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo 'hi, valera';
        return $this->render('index');
    }

}
