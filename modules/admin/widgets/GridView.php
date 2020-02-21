<?php

namespace app\modules\admin\widgets;

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/**
 * Class GridView
 * @package app\modules\panel\widgets
 */
class GridView extends \yii\grid\GridView
{
    /**
     * @var bool Колонка ID
     */
    public $showId = true;
    /**
     * @var array Кнопки действий
     */
    public $actionButtons = ['update', 'delete'];
    /**
     * @inheritDoc
     */
    public $layout = '{items}{pager}{summary}';
    /**
     * @inheritDoc
     */
    public $options = ['class' => 'grid-view table-responsive'];
    /**
     * @inheritDoc
     */
    public $tableOptions = ['class' => 'table table-bordered table-responsive table-hover'];
    /**
     * @inheritDoc
     */
    public $formatter = ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''];

    /**
     * @inheritDoc
     */
    protected function initColumns()
    {
        if ($this->showId) {
            array_unshift($this->columns, [
                'attribute' => 'id',
                'label' => 'ID',
                'contentOptions' => ['class' => 'text-right text-muted'],
                'headerOptions' => ['class' => 'w50'],
            ]);
        }
        if (in_array('view', $this->actionButtons)) {
            $this->columns[] = [
                'format' => 'raw',
                'header' => '<i class="fa fa-eye"></i>',
                'headerOptions' => ['class' => 'w30', 'style' => 'width:30px;text-align:center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Html::a(FA::i('eye'), ['view', 'id' => $model->id],
                        ['class' => 'btn btn-xs btn-primary', 'title' => 'Просмотр']);
                }
            ];
        }
        if (in_array('update', $this->actionButtons)) {
            $this->columns[] = [
                'format' => 'raw',
                'header' => '<i class="fa fa-pencil"></i>',
                'headerOptions' => ['class' => 'w30', 'style' => 'width:30px;text-align:center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Html::a(FA::i('pencil'), ['update', 'id' => $model->id],
                        ['class' => 'btn btn-xs btn-primary', 'title' => 'Редактировать']);
                }
            ];
        }
        if (in_array('delete', $this->actionButtons)) {
            $this->columns[] = [
                'format' => 'raw',
                'header' => '<i class="fa fa-trash"></i>',
                'headerOptions' => ['class' => 'w30', 'style' => 'width:30px;text-align:center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return Html::a(FA::i('trash'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-danger',
                        'title' => 'Удалить',
                        'data-confirm' => 'Are you sure you want to delete this item?',
                        'data-method' => 'post'
                    ]);
                }
            ];
        }

        parent::initColumns();
    }
}