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
 * This is the model class for table "manufacturer".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'name' => 'Название',
            'image' => 'Изображение',
            'imageFile' => 'Изображение'
        ];
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
