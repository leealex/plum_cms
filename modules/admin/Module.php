<?php

namespace app\modules\admin;


use app\models\Settings;
use app\models\SystemLog;
use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::configure(Yii::$app, require(__DIR__ . '/config.php'));

        $this->layout = 'main';
        $this->defaultRoute = 'dashboard';

        $this->loadSettings();
        $this->loadLogData();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        if (!Yii::$app->user->identity->isAdmin) {
            throw new ForbiddenHttpException('У вас нет доступа к этому разделу');
        }

        return true;
    }

    /**
     * Loads settings from DB into global params array
     */
    public function loadSettings()
    {
        $settings = Settings::getAll();
        foreach ($settings as $key => $value) {
            Yii::$app->params['settings'][$key] = $value;
        }
        Yii::$app->name = Yii::$app->params['settings']['siteName'];
        Yii::$app->params['settings']['userRole'] = '';
    }

    /**
     * Loads log data into params
     */
    public static function loadLogData()
    {
        $messages = SystemLog::find()->where(['read' => false]);

        Yii::$app->params['logCount'] = $messages->count();
        Yii::$app->params['logData'] = $messages->limit(5)->all();
    }
}
