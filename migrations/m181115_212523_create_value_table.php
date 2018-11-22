<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `value`.
 */
class m181115_212523_create_value_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('value', [
            'id' => $this->primaryKey(),
            'nomenclature_id' => $this->integer()->notNull(),
            'param_id' => $this->integer()->notNull(),
            'value' => $this->text()
        ]);

        $this->addForeignKey(
            'fk-value-nomenclature_id',
            'value',
            'nomenclature_id',
            'nomenclature',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-value-param_id',
            'value',
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
        $this->dropTable('value');
    }
}
