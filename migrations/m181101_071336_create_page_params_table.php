<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page_params`.
 */
class m181101_071336_create_page_params_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('page_params', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'name' => $this->string(50)->notNull(), // Название для обозначения в массиве
            'description' => $this->string(50)->notNull() // Название для заполнения пользователем
        ]);

        $this->addForeignKey(
            'fk-page_params-page_id',
            'page_params',
            'page_id',
            'page',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-page_params-page_id-name',
            'page_params',
            ['page_id', 'name'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page_params');
    }
}
