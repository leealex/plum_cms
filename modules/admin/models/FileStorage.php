<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "file_storage".
 *
 * @property integer $id
 * @property string $base_url
 * @property string $path
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $created_at
 */
class FileStorage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_storage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['base_url', 'path'], 'required'],
            [['size', 'created_at'], 'integer'],
            [['base_url', 'path'], 'string', 'max' => 1024],
            [['type', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'base_url' => 'Расположение',
            'path' => 'Расположение',
            'type' => 'Тип',
            'size' => 'Размер',
            'name' => 'Название',
            'created_at' => 'Создан',
        ];
    }

    /**
     * @param $id int|array
     * @return null|static|static[]
     */
    public static function getFilesById($id)
    {
        if (is_array($id)) {
            return self::find()->where(['in', 'id', $id])->all();
        } else {
            return self::findOne($id);
        }
    }

    /**
     * Update file path if it is not equal to base path    
     * @return integer the number of updated files
     */
    public static function updatePath()
    {
        $basePath = Yii::$app->basePath;
        $files = FileStorage::find()->all();
        $updated = 0;
        foreach ($files as $file) {
            $path = explode('/web', $file->path);
            if ($basePath !== $path[0]) {
                $file->path = $basePath . '/web' . $path[1];
                $file->save();
                $updated++;
            }
        }
        return $updated;
    }
}
