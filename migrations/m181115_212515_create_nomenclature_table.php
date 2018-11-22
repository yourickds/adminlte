<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `nomenclature`.
 */
class m181115_212515_create_nomenclature_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('nomenclature', [
            'id' => $this->primaryKey(),
            'shopId' => $this->integer(),
            'category_id' => $this->integer()->notNull(),
            'manufacturer_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ]);

        $this->addForeignKey(
            'fk-nomenclature-category_id',
            'nomenclature',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-nomenclature-manufacturer_id',
            'nomenclature',
            'manufacturer_id',
            'manufacturer',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('nomenclature');
    }
}
