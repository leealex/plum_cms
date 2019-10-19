<?php

namespace app\modules\admin\widgets;

use app\modules\admin\models\FileStorage;
use Yii;
use yii\base\Widget;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\helpers\FileHelper;
use yii\widgets\InputWidget;

/**
 * Renders text
 *
 * @author Alexey Lee <alex@plumy.ru>
 */
class ImageBrowser extends InputWidget
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
     * @var string
     */
    public $path = '@app/web/uploads/images';
    /**
     * Path to the no-image picture
     * @var string
     */
    public $noImage = '/img/no-image.png';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $widget = new Widget();
        $view = $widget->getView();
        ImageBrowserAsset::register($view);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();

        $inputName = Html::getInputName($this->model, $this->attribute);
        if (!$inputValue = Html::getAttributeValue($this->model, $this->attribute)) {
            $inputValue = $this->noImage;
        }

        $images = FileStorage::find()->where(['in', 'type', ['image/png', 'image/jpeg', 'image/jpg', 'image/gif']])
            ->orderBy(['id' => SORT_DESC])->all();
        $list = Html::beginTag('div', ['class' => 'row']);
        foreach ($images as $image) {
            $img = Html::img($image->base_url, ['alt' => $image->name, 'class' => 'img-responsive']);
            $title = Html::tag('div', $image->name);
            $list .= Html::tag('div', $img . $title, ['class' => 'image-browser-item']);
        }
        $list .= Html::endTag('div');

        $preview = Html::tag('div', Html::img($inputValue, ['class' => 'img-thumbnail']), [
            'class' => 'image-preview',
            'data-toggle' => 'modal',
            'data-target' => '#image-browser-modal'
        ]);
        $input = Html::hiddenInput($inputName, $inputValue, ['id' => 'image-browser-input']);
        Modal::begin([
            'id' => 'image-browser-modal',
            'header' => 'Обзор файлов',
            'size' => Modal::SIZE_LARGE
        ]);
        echo $list;
        Modal::end();

        return Html::tag('div', $preview . $input);
    }
}
