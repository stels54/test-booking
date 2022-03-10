<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bookings}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%room_categories}}`
 */
class m220310_170529_create_bookings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bookings}}', [
            'id' => $this->primaryKey(),
            'room_category_id' => $this->integer()->notNull(),
            'date_from' => $this->date()->notNull(),
            'date_to' => $this->date()->notNull(),
            'customer_name' => $this->string()->notNull(),
            'customer_email' => $this->string()->notNull(),
            'create_dt' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            '{{%idx-bookings-room_category_id}}',
            '{{%bookings}}',
            'room_category_id'
        );

        $this->addForeignKey(
            '{{%fk-bookings-room_category_id}}',
            '{{%bookings}}',
            'room_category_id',
            '{{%room_categories}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-bookings-room_category_id}}',
            '{{%bookings}}'
        );

        $this->dropIndex(
            '{{%idx-bookings-room_category_id}}',
            '{{%bookings}}'
        );

        $this->dropTable('{{%bookings}}');
    }
}
