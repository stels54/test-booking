<?php

use yii\db\Migration;

/**
 * Class m220310_174142_inserts_room_categories
 */
class m220310_174142_inserts_room_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%room_categories}}', ['title', 'rooms_count'], [
            [
                'Одноместный',
                2
            ],
            [
                'Двуместный',
                4
            ],
            [
                'Люкс',
                3
            ],
            [
                'Де-Люкс',
                5
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%room_categories}}');
    }
}
