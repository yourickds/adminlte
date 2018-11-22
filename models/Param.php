<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Yii;

/**
 * This is the model class for table "param".
 *
 * @property int $id
 * @property int $category_id
 * @property int $group_id
 * @property string $name
 * @property string $shortName
 * @property string $description
 * @property int $sort
 * @property int $xml
 *
 * @property Category $category
 * @property Group $group
 */
class Param extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'param';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'group_id', 'name', 'shortName'], 'required'],
            [['category_id', 'group_id', 'sort', 'xml', 'filter'], 'integer'],
            [['name', 'shortName', 'description', 'type_filter'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'group_id' => 'Группа',
            'name' => 'Название',
            'shortName' => 'Обозначение',
            'description' => 'Описание',
            'sort' => 'Сортировка',
            'xml' => 'Указывать в xml',
            'filter' => 'Показывать в фильтре',
            'type_filter' => 'Тип фильтра'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    public function getValue()
    {
        return $this->hasOne(Value::className(), ['param_id' => 'id']);
    }
}
