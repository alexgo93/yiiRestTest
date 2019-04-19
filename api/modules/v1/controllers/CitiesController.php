<?php

namespace api\modules\v1\controllers;

use common\models\Cities\City;
use common\models\Cities\CitySearch;
use yii\db\ActiveRecord;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Country Controller API
 *
 * @author Alex Golenko <alekseimell5644@gmail.com>
 */
class CitiesController extends ActiveController
{
    /**
     * path to model class for database request
     *
     * @var string
     *
     */
    public $modelClass = 'api\modules\v1\models\City';

    /**
     * action for query, which return cities by countryId
     *
     * @param Int $countryId
     *
     * @return array|null
     *
     */
    public function actionCapital(int $countryId): ?array
    {
        $result = City::find()
            ->where(["countryId" => $countryId])
            ->isCapital()
            ->all();

        return $result;
    }

}