<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $parent_id
 * @property string|null $title
 * @property string|null $url
 * @property int|null $order
 * @property boolean $status
 *
 * @property Menu[] $children Все потомки
 * @property Menu[] $activeChildren Активные потомки
 * @property Menu $parent Родитель
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['order', 'parent_id'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            ['status', 'boolean'],
            ['order', 'default', 'value' => 1]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'title' => 'Название',
            'url' => 'Адрес',
            'order' => 'Порядок',
            'status' => 'Активно',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(self::class, ['parent_id' => 'id'])->orderBy(['order' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActiveChildren()
    {
        return $this->getChildren()->where(['status' => true]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getParents()
    {
        return self::find()->where(['parent_id' => null])->all();
    }

    /**
     * @return array
     */
    public static function dropdownList()
    {
        return ArrayHelper::map(self::getParents(), 'id', 'title');
    }
}
