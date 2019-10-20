<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\SystemLog;
use app\modules\admin\models\SystemLogSearch;
use app\modules\admin\Module;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogController implements the CRUD actions for SystemLog model.
 */
class LogController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                    'clear' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SystemLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SystemLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (strcasecmp(Yii::$app->request->method, 'delete') == 0) {
            SystemLog::deleteAll($dataProvider->query->where);
            return $this->refresh();
        }
        $dataProvider->sort = [
            'defaultOrder' => ['log_time' => SORT_DESC]
        ];
        SystemLog::updateAll(['read' => true], ['read' => false]);
        Module::loadLogData();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SystemLog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->read = true;
        $model->save();
        Module::loadLogData();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SystemLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SystemLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SystemLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}