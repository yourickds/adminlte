<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m181101_071111_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'action' => $this->string()->notNull()->unique(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(),
            'meta_title' => $this->string()->notNull(),
            'meta_description' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page');
    }
}
