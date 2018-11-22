<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Yii;
use yii\base\Model;

class Repass extends Model
{
    public $pass;
    public $new_pass;
    public $r_new_pass;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pass', 'new_pass', 'r_new_pass'], 'required'],
            [['pass', 'new_pass', 'r_new_pass'], 'string'],
            ['r_new_pass', 'compare', 'compareAttribute' => 'new_pass'],
            ['pass', 'validatePassword']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pass' => 'Введите текущий пароль',
            'new_pass' => 'Введите новый пароль',
            'r_new_pass' => 'Повторите новый пароль'
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = Yii::$app->user->identity;

            if (!$user || !$user->validatePassword($this->pass)) {
                $this->addError($attribute, 'Неверный пароль');
            }
        }
    }
}