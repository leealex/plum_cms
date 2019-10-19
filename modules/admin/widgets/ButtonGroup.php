<?php
/**
 * @copyright Copyright &copy; Alexey Lee, plumy.ru, 2015
 * @package app\components
 * @version 1.1.0
 */
namespace app\modules\admin\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class ButtonGroup
 *
 * @author Alexey Lee <alex@plumy.ru>
 * @since 1.0
 */
class ButtonGroup extends \yii\widgets\InputWidget
{
    const CHECKBOX = 'checkbox';
    const RADIO = 'radio';
    /**
     * @var integer the type of the widget (Radio or Checkbox)
     */
    public $type = self::RADIO;
    /**
     * @var array the list of items for radio input
     * (applicable only if `type` = 2). The following
     * keys could be setup:
     * - label: string the label of each radio item. If this is
     *   set to false or null, the label will not be displayed.
     * - value: string the value of each radio item
     * - options: HTML attributes for the radio item
     * - labelOptions: HTML attributes for each radio item label
     */
    public $items = [];
    /**
     * @var string the value selected by default
     */
    public $default;
    /**
     * @var array the default HTML options for each item
     */
    public $labelOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (empty($this->type) && $this->type !== self::CHECKBOX && $this->type !== self::RADIO) {
            throw new InvalidConfigException("You must define a valid 'type' which must be either checkbox or radio.");
        }
        if (empty($this->items) || !is_array($this->items)) {
            throw new InvalidConfigException("You must setup the 'items' array.");
        }
        $this->registerAssets();
    }

    /**
     * Registers all necessary assets
     */
    public function registerAssets()
    {
        $widget = new Widget();
        $view = $widget->getView();
        ButtonGroupAsset::register($view);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $options = ['class' => 'btn-group', 'data-toggle' => 'buttons'];
        if (!empty($this->options)) {
            $options = array_merge($options, $this->options);
        }
        $html = Html::beginTag('div', $options);
        foreach ($this->items as $item) {
            if (!is_array($item)) {
                continue;
            }
            $html .= $this->renderItem($item);
        }
        $html .= Html::endTag('div');
        return $html;
    }

    /**
     * Renders item
     * @param $item array
     * @return
     */
    public function renderItem($item)
    {
        $value = $item['value'];
        $label = isset($item['label']) ? $item['label'] : $value;
        $labelOptions = ArrayHelper::merge($this->labelOptions, ArrayHelper::getValue($item, 'labelOptions', []));
        if (!isset($labelOptions['class'])) {
            $labelOptions['class'] = 'btn btn-default';
        }
        if ($this->hasModel()) {
            $name = Html::getInputName($this->model, $this->attribute);
            $name .= $this->type == self::CHECKBOX ? '[]' : null;
            if ($this->model->isNewRecord) {
                $active = isset($this->default) && $this->default == $value ? ' active' : false;
            } else {
                $active = Html::getAttributeValue($this->model, $this->attribute) == $value ? ' active' : false;
            }
        } else {
            $name = $this->name;
            $active = $this->default == $value ? ' active' : false;
        }
        $labelOptions['class'] = $labelOptions['class'] . $active;
        $type = $this->type;
        return Html::$type($name, $active, [
            'value' => $value,
            'label' => $label,
            'labelOptions' => $labelOptions,
        ]);
    }
}
