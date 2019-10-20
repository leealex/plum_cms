<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class UploadForm
 * @package app\models
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg, bmp, txt, doc, docx, zip, rar, pdf'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Файл'
        ];
    }

    /**
     * @return FileStorage|bool
     */
    public function upload()
    {
        if ($this->validate() && $this->file !== null) {
            $name = md5($this->file->baseName);
            $type = explode('/', $this->file->type);
            if ($type[0] === 'image') {
                $path = Yii::getAlias('@app/web/uploads/images/');
                $url = '/uploads/images/';
            } else {
                $path = Yii::getAlias('@app/web/uploads/files/');
                $url = '/uploads/files/';
            }
            if (file_exists($path . $name . '.' . $this->file->extension)) {
                $name .= '_' . time() . '.' . $this->file->extension;
            } else {
                $name .= '.' . $this->file->extension;
            }
            $this->file->saveAs($path . $name);
            $storage = new FileStorage();
            $storage->path = $path . $name;
            $storage->base_url = $url . $name;
            $storage->name = $name;
            $storage->size = $this->file->size;
            $storage->type = $this->file->type;
            $storage->created_at = time();
            $storage->save();

            return $storage;
        } else {
            return false;
        }
    }
}