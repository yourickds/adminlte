<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `filter`.
 */
class m181116_160250_create_filter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filter', [
            'id' => $this->primaryKey(),
            'param_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
            'value' => $this->string()->notNull()
        ]);

        $this->addForeignKey(
            'fk-filter-param_id',
            'filter',
            'param_id',
            'param',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('filter');
    }
}
