<?php

namespace app\modules\admin\widgets;


use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;

/**
 * Menu widget renders a menu
 *
 * @author Alexey Lee <alex@plumy.ru>
 */
class Settings extends Widget
{
    /**
     * @var array
     */
    public $settings;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $widget = new Widget();
        $view = $widget->getView();
        SettingsAsset::register($view);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();

        $form = ActiveForm::begin();

        $keyTitle = Html::tag('th', 'Код', ['width' => '200']);
        $valueTitle = Html::tag('th', 'Значение', ['width' => '400']);
        $commentTitle = Html::tag('th', 'Комментарий');
        $rows = Html::tag('tr', $keyTitle . $valueTitle . $commentTitle);
        foreach ($this->settings as $index => $setting) {
            $disabled = $setting->editable === 0 ? ['disabled' => 'disabled'] : [];
            $delete = $setting->editable === 0 ? '' :
                Html::tag('td', Html::button('Удалить', ['id' => $index, 'class' => 'btn btn-danger delete-row']));
            $key = Html::tag('td', $form->field($setting, "[$index]key")->textInput($disabled)->label(false));
            $value = Html::tag('td', $form->field($setting, "[$index]value")->textInput()->label(false));
            $comment = Html::tag('td', $form->field($setting, "[$index]comment")->textInput($disabled)->label(false));
            $rows .= Html::tag('tr', $key . $value . $comment . $delete);
        }
        $table = Html::tag('table', $rows, ['class' => 'settings-table table table-condensed']);
        $button = Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
        $addRow = Html::button('Добавить настройку', ['id' => 'add-row', 'class' => 'btn btn-primary']);

        echo Html::tag('div', $table . '<p>' . $addRow . ' ' . $button . '</p>', ['class' => 'col-md-12']);

        ActiveForm::end();
    }
}
