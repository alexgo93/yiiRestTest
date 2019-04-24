<?php

namespace api\modules\v1\controllers;

//use api\modules\v1\models\Country;
use yii\rest\ActiveController;
use common\models\Countries\Country;
use common\models\Countries\CountryQuery;
use common\models\Cities\City;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;
use yii\web\Response;

/**
 * Country Controller API
 *
 * @author Alex Golenko <alekseimell5644@gmail.com>
 */
class CountriesController extends ActiveController
{
    /**
     * behaviors for country controller
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class'   => 'yii\filters\ContentNegotiator',
                'only'    => ['view', 'index'],
                'formats' => [
                    'application/xml' => Response::FORMAT_XML,
                ],
            ],
            'authenticator' => [
                'class'       => CompositeAuth::class,
                'authMethods' => [
                    HttpBasicAuth::class,
                    QueryParamAuth::class,
                    HttpBearerAuth::class,
                ],
            ],
            'access'        => [
                'class' => AccessControl::class,
                'only'  => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index', 'view'],
                        'roles'   => ['?'],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['index', 'create', 'update', 'delete', 'view'],
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

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