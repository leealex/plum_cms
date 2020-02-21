<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\FileStorage;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\SystemLog;
use app\modules\admin\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DashboardController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $this->view->params['user'] = Yii::$app->user->identity;
            Yii::$app->user->loginUrl = ['/admin/dashboard/login'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SystemLog::find(),
            'pagination' => ['pageSize' => 5],
            'sort' => ['defaultOrder' => ['log_time' => SORT_DESC]]
        ]);
        $counters = [
            'users' => User::find()->count()
        ];

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'counters' => $counters
        ]);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }
        return $this->render('login', ['model' => $model,]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin');
    }

    /**
     * @return string
     */
    public function actionError()
    {
        return $this->render('error', [
            'name' => 'Ошибка доступа',
            'message' => 'У вас нет прав на просмотр содержимого этого раздела.',
        ]);
    }
}
