<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $action
 * @property string $name
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 *
 * @property PageParams[] $pageParams
 * @property PageValues[] $pageValues
 * @property PageParams[] $params
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['action', 'name', 'meta_title'], 'required'],
            [['action', 'description', 'meta_title', 'meta_description'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
            [['action'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action' => 'Action',
            'name' => 'Название',
            'description' => 'Описание',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageParams()
    {
        return $this->hasMany(PageParams::className(), ['page_id' => 'id'])->indexBy('name')
            ->joinWith('pageValues', false)
            ->select(['page_params.id', 'page_params.page_id', 'page_params.name', 'page_values.value']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageValues()
    {
        return $this->hasMany(PageValues::className(), ['page_id' => 'id'])->joinWith('param')->indexBy('param_id');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParams()
    {
        return $this->hasMany(PageParams::className(), ['id' => 'param_id'])->viaTable('page_values', ['page_id' => 'id']);
    }
}
