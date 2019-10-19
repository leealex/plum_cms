<?php
/**
 *
 */
namespace app\modules\admin\widgets;


use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\InputWidget;

/**
 *
 * @author Alexey Lee <alex@plumy.ru>
 * @since 1.0
 */
class FileInput extends InputWidget
{
    public $target;
    public $attribute = 'files[]';
    public $parentModel;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $widget = new Widget();
        $view = $widget->getView();
        FileInputAsset::register($view);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->view->registerJs('
            fileInput.input = $("#' . Html::getInputId($this->model, $this->attribute) . '");          
            fileInput.ids = $("#' . Html::getInputId($this->parentModel, 'filesId') . '");
            fileInput.init();
        ', View::POS_READY);
        $inputFile = Html::tag('div', 'Загрузить с компьютера'
            . Html::activeFileInput($this->model, $this->attribute, $this->options),
            ['class' => 'btn btn-primary btn-file pull-left']);
        $inputIds = Html::activeHiddenInput($this->parentModel, 'filesId');

        $media = $this->parentModel->media;
        $images = '';
        foreach ($media as $item) {
            $images .= '<div class="media-container" data-id="' . $item->id . '">
            <img class="media-container-image" src="' . $item->url . '"/><span class="media-delete"></span></div>';
        }
        $imagesWrapper = Html::tag('div', $images, ['class' => 'images-wrapper']);
        return $inputFile . $inputIds . $imagesWrapper;
    }
}
