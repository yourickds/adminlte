<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace yourickds\adminlte\models;

use Helper\Scenario;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $role;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['email', 'role'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['role'], 'string'],
            [['role'], 'validateRole']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Почта',
            'role' => 'Роль'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function generateAuthKey()
    {
        $this->authKey = \Yii::$app->security->generateRandomString();
    }

    public function validateRole($attribute)
    {
        $role = \Yii::$app->authManager->getRole($this->role);
        if (!$role || $role->name == 'root')
            return $this->addError($attribute, 'Необходимо заполнить «Роль».');
    }

    public function changePassword($password)
    {
        $this->password = \Yii::$app->security->generatePasswordHash($password);
        $rolesUser = \Yii::$app->authManager->getRolesByUser($this->id);
        foreach ($rolesUser as $roleUser){
            $this->role = $roleUser->name;
        }
        if ($this->role == 'root') {
            \Yii::$app->session->setFlash('error', 'Невозможно изменить пароль для суперпользователя!');
        }
    }
}