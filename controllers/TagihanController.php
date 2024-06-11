<?php

namespace app\controllers;

use app\models\Tagihan;
use app\models\TagihanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TagihanController implements the CRUD actions for Tagihan model.
 */
class TagihanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tagihan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TagihanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tagihan model.
     * @param int $id_tagihan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tagihan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tagihan),
        ]);
    }

    /**
     * Creates a new Tagihan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tagihan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tagihan' => $model->id_tagihan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tagihan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_tagihan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tagihan)
    {
        $model = $this->findModel($id_tagihan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tagihan' => $model->id_tagihan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tagihan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_tagihan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tagihan)
    {
        $this->findModel($id_tagihan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tagihan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_tagihan
     * @return Tagihan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tagihan)
    {
        if (($model = Tagihan::findOne(['id_tagihan' => $id_tagihan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
