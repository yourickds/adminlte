<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $image
 * @property int $sort
 * @property int $status
 * @property string $metaTitle
 * @property string $metaDescription
 * @property string $created_at
 * @property string $update_at
 */
class Category extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'sort', 'status'], 'integer'],
            [['name', 'url', 'metaTitle'], 'required'],
            [['description'], 'string'],
            [['created_at', 'update_at'], 'safe'],
            [['name', 'url', 'image', 'metaTitle', 'metaDescription'], 'string', 'max' => 255],
            [['parent', 'sort', 'status'], 'default', 'value' => 0],
            [['url'], 'match', 'pattern' => '/^[a-z\-]*$/i'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'mimeTypes' => 'image/*', 'maxSize' => 1024*1024*5]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Родительская категория',
            'name' => 'Название',
            'description' => 'Описание',
            'url' => 'Url - адрес',
            'image' => 'Изображение',
            'sort' => 'Сортировка',
            'status' => 'Статус',
            'metaTitle' => 'Мета заголовок',
            'metaDescription' => 'Мета описание',
            'created_at' => 'Дата создания',
            'update_at' => 'Дата обновления',
            'imageFile' => 'Изображение'
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }

    public function upload($path, $name)
    {
        if ($this->validate()) {
            FileHelper::createDirectory($path, 0755);
            $this->imageFile->saveAs($path . '/' . $name);
            $this->imageFile = null;
            return true;
        } else {
            return false;
        }
    }
}
