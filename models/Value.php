<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Yii;

/**
 * This is the model class for table "value".
 *
 * @property int $id
 * @property int $nomenclature_id
 * @property int $param_id
 * @property string $value
 *
 * @property Nomenclature $nomenclature
 * @property Param $param
 */
class Value extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomenclature_id', 'param_id'], 'required'],
            [['nomenclature_id', 'param_id'], 'integer'],
            [['value'], 'string'],
            [['nomenclature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nomenclature::className(), 'targetAttribute' => ['nomenclature_id' => 'id']],
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
            'nomenclature_id' => 'Nomenclature ID',
            'param_id' => 'Param ID',
            'value' => 'Значение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNomenclature()
    {
        return $this->hasOne(Nomenclature::className(), ['id' => 'nomenclature_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(Param::className(), ['id' => 'param_id']);
    }
}
