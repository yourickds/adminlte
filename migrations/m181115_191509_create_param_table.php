<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `param`.
 */
class m181115_191509_create_param_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('param', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'shortName' => $this->string()->notNull(),
            'description' => $this->string(),
            'sort' => $this->integer()->notNull()->defaultValue(0),
            'xml' => $this->boolean()->notNull()->defaultValue(false),
            'filter' => $this->boolean()->notNull()->defaultValue(0),
            'type_filter' => 'ENUM("Чекбокс", "Диапазон")'
        ]);

        $this->addForeignKey(
            'fk-param-category_id',
            'param',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-param-group_id',
            'param',
            'group_id',
            'group',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('param');
    }
}
