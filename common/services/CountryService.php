<?php

namespace common\services;

use MP\Services\BaseModelService;
use yii\db\ActiveQuery;
use common\models\Cities\CityQuery;
use common\models\Cities\City;
use common\models\Countries\Country;
use yii\web\NotFoundHttpException;

/**
 * Class    CountryService
 * @package common\services
 * @author  Alex Golenko
 * @version 2.0
 *
 * This is the service class for country model.
 * @property Country $model
 */
class CountryService extends BaseModelService
{
    /**
     * Get cities for country
     *
     * @return CityQuery|ActiveQuery
     */
    public function getCities(int $id): CityQuery
    {
        $country = $this->findModel($id);

        return $country->hasMany(City::class, ['countryId' => 'id'])
            ->inverseOf('country');
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return Country||null
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): ?Country
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}