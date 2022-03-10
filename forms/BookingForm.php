<?php

namespace app\forms;

use yii\base\Model;

class BookingForm extends Model
{
    public $date_from;
    public $date_to;
    public $customer_name;
    public $customer_email;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_from', 'date_to', 'customer_name', 'customer_email'], 'required'],
            [['date_from', 'date_to'], 'safe'],
            [['customer_name', 'customer_email'], 'string', 'max' => 255],
        ];
    }
}
