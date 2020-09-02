<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class FileManagerController extends Controller
{
    /**
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
