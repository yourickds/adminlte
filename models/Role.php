<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Yii;
use yii\base\Model;

class Role extends Model
{
    public $name;
    public $description;
    public $permissions;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'validateUnique', 'on' => 'create'],
            [['permissions'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание',
            'permissions' => 'Разрешения'
        ];
    }

    public function validateUnique($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $role = Yii::$app->authManager->getRole($this->name);
            if ($role)
                $this->addError($attribute, 'Роль уже существует');
        }
    }
}
