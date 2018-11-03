<?php

namespace yourickds\adminlte\models;

use Yii;

/**
 * This is the model class for table "page_values".
 *
 * @property int $page_id
 * @property int $param_id
 * @property string $value
 *
 * @property Page $page
 * @property PageParams $param
 */
class PageValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'param_id'], 'required'],
            [['page_id', 'param_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['page_id', 'param_id'], 'unique', 'targetAttribute' => ['page_id', 'param_id']],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageParams::className(), 'targetAttribute' => ['param_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'param_id' => 'Param ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(PageParams::className(), ['id' => 'param_id']);
    }
}
