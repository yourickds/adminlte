<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181021_113456_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(50)->notNull(),
            'password' => $this->string(255)->notNull(),
            'authKey' => $this->string(255)
        ]);

        $this->insert('user', [
            'email' => 'admin@admin.ru',
            'password' => Yii::$app->security->generatePasswordHash('password'),
        ]);

        $role = Yii::$app->authManager->createRole('root');
        $role->description = 'Суперпользователь';
        Yii::$app->authManager->add($role);

        $permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit->description = 'Доступ в админ панель';
        Yii::$app->authManager->add($permit);

        Yii::$app->authManager->addChild($role, $permit);
        Yii::$app->authManager->assign($role, 1);

        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);

        Yii::$app->authManager->addChild($role, $permit);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
