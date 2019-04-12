<?php

namespace api\modules\country\controllers;

use api\modules\country\models\Country;
use yii\rest\ActiveController;
use \yii\db\Query;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CountriesController extends ActiveController
{
    public function actionTest(string $param) : string
    {
        //$query = (new Query())
        //    ->select("*")
        //    ->from('countries')
        //    ->where(["code" => $param]);

        $cc = Countries::find()
            ->where(["code" => $param])
            ->one();

        return $cc;
    }

    public $modelClass = 'api\modules\country\models\Country';
}