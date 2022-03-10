<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "room_categories".
 *
 * @property int $id
 * @property string $title
 * @property int $rooms_count
 *
 * @property Booking[] $bookings
 */
class RoomCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'rooms_count'], 'required'],
            [['rooms_count'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'rooms_count' => 'Rooms Count',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::class, ['room_category_id' => 'id']);
    }
}