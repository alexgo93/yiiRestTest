<?php

namespace api\modules\v1\controllers;

//use api\modules\v1\models\Country;
use yii\rest\ActiveController;
use common\models\Countries\Country;
use common\models\Countries\CountryQuery;
use common\models\Cities\City;

/**
 * Country Controller API
 *
 * @author Alex Golenko <alekseimell5644@gmail.com>
 */
class CountriesController extends ActiveController
{
    /**
     * path to model for database request
     *
     * @var string
     *
     */
    public $modelClass = 'api\modules\v1\models\Country';

    /**
     * action for query, which return countries by code
     *
     * @param string $code
     *
     * @return Country|null
     *
     */

    public function actionTest(string $code): ?Country
    {

        $result = Country::find()
            ->where(["code" => $code])
            ->one();

        return $result;
    }

    /**
     * Get cities list by country code
     *
     * @param string $code
     *
     * @return array
     */
    public function actionCities(string $code): array
    {
        if (!empty($code)) {
            $country = Country::find()
                ->where(["code" => $code])
                ->one();

            if (!empty($country)) {
                return $country->getCities()->all();
            }
        }

        return [];
    }
}