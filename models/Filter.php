<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Yii;

/**
 * This is the model class for table "filter".
 *
 * @property int $id
 * @property int $param_id
 * @property string $name
 * @property string $description
 * @property string $value
 *
 * @property Param $param
 */
class Filter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['param_id', 'name', 'value'], 'required'],
            [['param_id'], 'integer'],
            [['name', 'description', 'value'], 'string', 'max' => 255],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => Param::className(), 'targetAttribute' => ['param_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'param_id' => 'Параметр',
            'name' => 'Название',
            'description' => 'Описание',
            'value' => 'Значение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(Param::className(), ['id' => 'param_id']);
    }
}
