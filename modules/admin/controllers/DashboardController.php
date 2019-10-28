<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\FileStorage;
use app\modules\admin\models\LoginForm;
use app\modules\admin\models\SystemLog;
use app\modules\admin\models\User;
use vova07\imperavi\actions\DeleteFileAction;
use vova07\imperavi\actions\GetFilesAction;
use vova07\imperavi\actions\GetImagesAction;
use vova07\imperavi\actions\UploadFileAction;
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
     * Экшен сохраняет информацию в файл-менеджер о загруженном файле через форму Imperavi
     *
     * @inheritdoc
     */
    public function afterAction($action, $result)
    {
        if (in_array($action->id, ['image-upload', 'file-upload'])) {
            $fileName = basename($result['filelink']);
            if ($file = $_FILES['file']) {
                $storage = new FileStorage(['path' => $action->path . $fileName, 'base_url' => $result['filelink']]);
                $storage->setAttributes($file);
                $storage->name = $fileName;
                $storage->save();
            }
        }
        return parent::afterAction($action, $result);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'images-get' => [
                'class' => GetImagesAction::class,
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
            'files-get' => [
                'class' => GetFilesAction::class,
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
            'image-upload' => [
                'class' => UploadFileAction::class,
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
            'file-upload' => [
                'class' => UploadFileAction::class,
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
                'uploadOnlyImage' => false
            ],
            'file-delete' => [
                'class' => DeleteFileAction::class,
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ],
        ];
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
        return $this->render('login', ['model' => $model, ]);
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
