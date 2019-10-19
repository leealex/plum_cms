<?php

namespace app\modules\admin\widgets;

use app\modules\admin\models\WidgetText;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;

/**
 * Renders text
 *
 * @author Alexey Lee <alex@plumy.ru>
 */
class Text extends Widget
{
    /**
     * @var string The key of the text
     */
    public $key;
    /**
     * @var array HTML options 
     */
    public $htmlOptions = [];

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

        /**
         * @var $text WidgetText
         */
        $text = WidgetText::findOne(['key' => $this->key]);
        $html = Html::beginTag('div', $this->htmlOptions);
        $html .= $text->body;
        $html .= Html::endTag('div');
        return $html;
    }
}
