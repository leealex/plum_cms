<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\FileStorage;
use app\modules\admin\models\FileStorageSearch;
use app\modules\admin\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $searchModel = new FileStorageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                return $this->redirect('/admin/file-manager');
            }
        }
        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = FileStorage::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/admin/file-manager');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($file = FileStorage::findOne($id)) {
            if (file_exists($file->path)) {
                unlink($file->path);
            }
            $file->delete();
        }
        return $this->redirect('/admin/file-manager');
    }

    /**             
     * Updates paths on the server
     * @return \yii\web\Response
     */
    public function actionUpdatePath()
    {
        $updatedFiles = FileStorage::updatePath();
        Yii::$app->session->setFlash('success', 'Обновлено ' . $updatedFiles . ' файлов.');
        return $this->redirect('/admin/file-manager');
    }
}
