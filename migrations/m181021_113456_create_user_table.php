<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

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
//        Администратор
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);

        Yii::$app->authManager->addChild($role, $permit);
//        Менеджер
        $role = Yii::$app->authManager->createRole('manager');
        $role->description = 'Менеджер';
        Yii::$app->authManager->add($role);

        Yii::$app->authManager->addChild($role, $permit);


        // Добавление списка разрешений

//        Редактирование страницы
        $permit = Yii::$app->authManager->createPermission('updatePage');
        $permit->description = 'Редактирование страницы';
        Yii::$app->authManager->add($permit);
//        Доб/Ред категории
        $permit = Yii::$app->authManager->createPermission('cuCategory');
        $permit->description = 'Доб/Ред категории';
        Yii::$app->authManager->add($permit);
//        Доб/Ред группы
        $permit = Yii::$app->authManager->createPermission('cuGroup');
        $permit->description = 'Доб/Ред группы';
        Yii::$app->authManager->add($permit);
//        Доб/Ред параметра категории
        $permit = Yii::$app->authManager->createPermission('cuParamCategory');
        $permit->description = 'Доб/Ред параметра категории';
        Yii::$app->authManager->add($permit);
//        Доб/Ред производителя
        $permit = Yii::$app->authManager->createPermission('cuManufacturer');
        $permit->description = 'Доб/Ред производителя';
        Yii::$app->authManager->add($permit);
//        Доб/Ред номенклатуры
        $permit = Yii::$app->authManager->createPermission('cuNomenclature');
        $permit->description = 'Доб/Ред номенклатуры';
        Yii::$app->authManager->add($permit);
//        Редактирование значений номенклатуры
        $permit = Yii::$app->authManager->createPermission('updateValueNomenclature');
        $permit->description = 'Редактирование значений номенклатуры';
        Yii::$app->authManager->add($permit);
//        Доб/Ред фильтра
        $permit = Yii::$app->authManager->createPermission('cuFilter');
        $permit->description = 'Доб/Ред фильтра';
        Yii::$app->authManager->add($permit);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
