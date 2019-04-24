<?php

namespace common\services;

use MP\Services\BaseControllerService;
use common\models\Countries\Country;
use common\models\Countries\CountrySearch;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Class    CountryControllerService
 * @package common\services
 * @author  Alex Golenko
 * @version 2.0
 *
 * This is the service class for country model.
 * @property Country $model
 */
class CountryControllerService extends BaseControllerService
{
    /**
     * Lists all Country models.
     *
     * @return array
     */
    public function allCountries(): array
    {
        $searchModel  = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ];
    }

    /**
     * Displays a single Country model.
     *
     * @param int $id
     *
     * @return array
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function oneCountry(int $id): ?array
    {
        $model = $this->findModel($id);

        return ['model' => $model];
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