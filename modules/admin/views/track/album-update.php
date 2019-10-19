<?php

/**
 * @var $this yii\web\View
 * @var $model \app\models\Album
 * @var $group array
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование альбома: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'альбомы', 'url' => ['track/albums']];
$this->params['breadcrumbs'][] = 'Редактирование';

?>
<div class="user-update">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Свойства</div>
                <div class="panel-body">
                    <div class="user-form">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
