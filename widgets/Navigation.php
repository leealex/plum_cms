<?php

namespace app\widgets;

use app\modules\admin\models\Menu;

/**
 * Виджет динамичиского фона
 *
 * @package app\widgets
 */
class Navigation extends \yii\bootstrap\Widget
{
    /**
     * @var string
     */
    public $class = 'nav navbar-nav navbar-right';
    /**
     * @var Menu[] Пункты меню
     */
    private $items;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->items = Menu::find()
            ->where(['status' => true])
            ->orderBy(['order' => SORT_ASC, 'id' => SORT_ASC])
            ->all();
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $elements = '';
        foreach ($this->items as $item) {
            if ($item->activeChildren) {
                $element = '<li class="dropdown">';
                $element .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'
                    . $item->title . ' <span class="caret"></span></a>';
                $element .= '<ul class="dropdown-menu">';
                foreach ($item->activeChildren as $child) {
                    $element .= '<li><a href="' . $child->url . '">' . $child->title . '</a></li>';
                }
                $element .= '</ul>';
                $element .= '</li>';
                $elements .= $element;
            } else {
                $elements .= '<li><a href="' . $item->url . '">' . $item->title . '</a></li>';
            }
        }

        return '<ul class="' . $this->class . '">' . $elements . '</ul>';
    }
}
