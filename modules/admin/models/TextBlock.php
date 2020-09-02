<?php

namespace app\modules\admin\models;

use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "text_block".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $slug
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class TextBlock extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'text_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true,
                'ensureUnique' => true
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'slug' => 'Slug',
            'status' => 'Активно',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
        ];
    }

    /**
     * Возвращает текстовый блок по слагу
     *
     * @param $slug
     * @return TextBlock|null
     */
    public static function get($slug)
    {
        return self::findOne(['slug' => $slug, 'status' => true]);
    }

    /**
     * @param $slug
     * @return string|null
     */
    public static function getText($slug)
    {
        if ($block = self::get($slug)) {
            return $block->text;
        }
        return null;
    }

    /**
     * @param $slug
     * @return string|null
     */
    public static function getTitle($slug)
    {
        if ($block = self::get($slug)) {
            return $block->title;
        }
        return null;
    }
}
