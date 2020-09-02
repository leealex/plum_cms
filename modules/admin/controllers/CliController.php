<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * CLI controller for the `admin` module
 */
class CliController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionGitStatus()
    {
        return $this->executeCommand('git status');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionGitPull()
    {
        return $this->executeCommand('git pull');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionGitHardPull()
    {
        return $this->executeCommand('git fetch --all && git reset --hard origin/master && git pull origin master');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionComposerInstall()
    {
        return $this->executeCommand('composer install');
    }

    /**
     * @return \yii\web\Response
     */
    public function actionComposerUpdate()
    {
        return $this->executeCommand('composer update');
    }

    /**
     * @param $command
     * @return \yii\web\Response
     */
    private function executeCommand($command)
    {
        shell_exec('cd ' . Yii::getAlias('@app'));
        $result = shell_exec($command . ' 2>&1');
        Yii::$app->session->setFlash('success', '<pre>' . $result . '</pre>');

        return $this->redirect('/admin/cli');
    }
}
