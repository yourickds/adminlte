<?php

namespace yourickds\adminlte\models;

use Yii;

/**
 * This is the model class for table "page_params".
 *
 * @property int $id
 * @property int $page_id
 * @property string $name
 * @property string $description
 *
 * @property Page $page
 * @property PageValues[] $pageValues
 * @property Page[] $pages
 */
class PageParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'name', 'description'], 'required'],
            [['page_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 50],
            [['page_id', 'name'], 'unique', 'targetAttribute' => ['page_id', 'name']],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'name' => 'Название',
            'description' => 'Описание для заполнения',
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
    public function getPageValues()
    {
        return $this->hasMany(PageValues::className(), ['param_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['id' => 'page_id'])->viaTable('page_values', ['param_id' => 'id']);
    }
}
