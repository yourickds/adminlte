<?php
/**
 * @link https://github.com/yourickds/adminlte
 * @copyright Copyright (c) 2018 Yourick
 * @license http://opensource.org/licenses/MIT MIT
 */

use yii\db\Migration;

/**
 * Handles the creation of table `visitor`.
 */
class m181021_112025_create_visitor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('visitor', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(15)->notNull(),
            'referer' => $this->string(255),
            'userAgent' => $this->string(255),
            'date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'lastTime' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('visitor');
    }
}
