<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%room_categories}}`.
 */
class m220310_164445_create_room_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%room_categories}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'rooms_count' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%room_categories}}');
    }
}
