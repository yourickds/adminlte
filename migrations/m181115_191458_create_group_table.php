<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `group`.
 */
class m181115_191458_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'sort' => $this->integer()->notNull()->defaultValue(0)
        ]);

        $this->addForeignKey(
            'fk-group-category_id',
            'group',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('group');
    }
}
