<?php

namespace backend\controllers;

use common\models\Countries\Country;
use common\services\CountryControllerService;
use MP\Services\ImplementServices;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\rbac\Permissions;

/**
 * Country Controller API
 *
 * @author Alex Golenko <alekseimell5644@gmail.com>
 */
class CountriesController extends Controller
{
    use ImplementServices;

    /**
     * behaviors for country controller
     *
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index'],
                        'roles'   => [],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['view'],
                        'roles'   => [],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['create'],
                        'roles'   => [Permissions::CREATE_POST],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['update'],
                        'roles'   => [Permissions::UPDATE_POST],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['delete'],
                        'roles'   => [Permissions::DELETE_POST],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function services(): array
    {
        return [
            'countriesControllerService' => CountryControllerService::class,
        ];
    }

    /**
     * Lists all Country models.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', $this->countriesControllerService->allCountries());

    }

    /**
     * Displays a single Country model.
     *
     * @param int $id
     *
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        return $this->render('view', $this->countriesControllerService->oneCountry($id));
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return Country
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Country
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}