<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class FileManagerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
