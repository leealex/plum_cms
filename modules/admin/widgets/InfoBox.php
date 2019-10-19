<?php

namespace app\modules\admin\widgets;

use Yii;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;
use yii\helpers\Url;

/**
 * Renders an info block with the number of records of the model
 *
 * @author Alexey Lee <alex@plumy.ru>
 */
class InfoBox extends Widget
{
    /**
     * @var string
     */
    public $counterName;
    /**
     * @var string '/admin/user'
     */
    public $controllerPath;
    /**
     * @var string
     */
    public $title = 'Info box';
    /**
     * @var string Fontawesome icon code 'fa fa-user'
     */
    public $icon = 'fa fa-info-circle';
    /**
     * @var string
     */
    public $iconColor = 'blue';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();

        $counter = Yii::$app->params['counters'][$this->counterName];
        $icon = Html::a(Html::tag('span', Html::tag('i', '', ['class' => $this->icon]),
            ['class' => 'info-box-icon bg-' . $this->iconColor]), Url::to($this->controllerPath));
        $title = Html::tag('span', $this->title, ['class' => 'info-box-text']);
        $number = Html::tag('span', $counter, ['class' => 'info-box-number']);
        $button = Html::a('Добавить', Url::to($this->controllerPath . '/create'), ['class' => 'btn btn-primary pull-right']);
        $content = Html::tag('div', $title . $number . $button, ['class' => 'info-box-content']);

        return Html::tag('div', $icon . $content, ['class' => 'info-box']);
    }
}
