<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "bookings".
 *
 * @property int $id
 * @property int $room_category_id
 * @property string $date_from
 * @property string $date_to
 * @property string $customer_name
 * @property string $customer_email
 * @property string $create_dt
 *
 * @property RoomCategory $roomCategory
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_category_id', 'date_from', 'date_to', 'customer_name', 'customer_email'], 'required'],
            [['room_category_id'], 'integer'],
            [['date_from', 'date_to', 'create_dt'], 'safe'],
            [['customer_name', 'customer_email'], 'string', 'max' => 255],
            [['room_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoomCategory::class, 'targetAttribute' => ['room_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_category_id' => 'Room Category ID',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'customer_name' => 'Customer Name',
            'customer_email' => 'Customer Email',
            'create_dt' => 'Create Dt',
        ];
    }

    /**
     * Gets query for [[RoomCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoomCategory()
    {
        return $this->hasOne(RoomCategory::class, ['id' => 'room_category_id']);
    }
}
