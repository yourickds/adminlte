<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `page_values`.
 */
class m181101_071538_create_page_values_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('page_values', [
            'page_id' => $this->integer()->notNull(),
            'param_id' => $this->integer()->notNull(),
            'value' => $this->string()
        ]);

        $this->addPrimaryKey('page_values-pk', 'page_values', ['page_id', 'param_id']);

        $this->addForeignKey(
            'fk-page_values-page_id',
            'page_values',
            'page_id',
            'page',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-page_values-param_id',
            'page_values',
            'param_id',
            'page_params',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page_values');
    }
}
