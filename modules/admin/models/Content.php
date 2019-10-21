<?php

namespace app\modules\admin\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $text
 * @property string $slug
 * @property string $position
 * @property int $order
 * @property int $container
 * @property int $show_title
 * @property int $active
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Content extends ActiveRecord
{
    /**
     * @var array
     */
    public static $positions = [
        'page' => 'Страница',
        'channel_1' => 'О канале RuWorship',
        'channel_2' => 'О канале RuChristmas',
        'channel_3' => 'О канале Псалом',
        'channel_4' => 'О канале Новый завет',
        'channel_5' => 'О канале Библия по плану',
        'footer_1' => 'Подвал 1',
        'footer_2' => 'Подвал 2',
        'footer_3' => 'Подвал 3',
        'footer_4' => 'Подвал 4'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['user_id', 'order', 'container', 'show_title', 'active', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['title', 'slug', 'position'], 'string', 'max' => 255],
            ['order', 'default', 'value' => 0]
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
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id'

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
            'user_id' => 'Автор',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'slug' => 'Slug',
            'position' => 'Позиция',
            'order' => 'Порядок',
            'container' => 'HTML Контейнер',
            'show_title' => 'Показать заголовок',
            'active' => 'Включен',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
