<?php

namespace app\modules\admin\controllers;

use app\models\FileStorage;
use app\models\SystemLog;
use app\models\User;
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
     * @inheritdoc
     */
    public function afterAction($action, $result)
    {
        if ($action->id === 'image-upload' || $action->id === 'file-upload') {
            $fileName = substr($result['filelink'], strrpos($result['filelink'], '/') + 1);
            if ($file = $_FILES['file']) {
                $storage = new FileStorage();
                $storage->path = $action->path . $fileName;
                $storage->base_url = $result['filelink'];
                $storage->name = $fileName;
                $storage->size = $file['size'];
                $storage->type = $file['type'];
                $storage->created_at = time();
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
            'image-upload' => [
                'class' => UploadFileAction::class,
                'url' => '/uploads/images/',
                'path' => '@app/web/uploads/images'
            ],
            'images-get' => [
                'class' => GetImagesAction::class,
                'url' => '/uploads/images/',
                'path' => '@app/web/uploads/images',
            ],
            'file-upload' => [
                'class' => UploadFileAction::class,
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
                'uploadOnlyImage' => false
            ],
            'files-get' => [
                'class' => GetFilesAction::class,
                'url' => '/uploads/files/',
                'path' => '@app/web/uploads/files',
            ]
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
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
