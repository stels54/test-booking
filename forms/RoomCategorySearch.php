<?php

namespace app\forms;

use app\helpers\DatetimeHelper;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\entities\RoomCategory;

/**
 * RoomCategorySearch represents the model behind the search form of `app\entities\RoomCategory`.
 */
class RoomCategorySearch extends Model
{
    public $date_from;
    public $date_to;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'safe'],
            ['date_from', 'validateDates']
        ];
    }

    public function validateDates($attribute, $params)
    {
        if (!DatetimeHelper::validateDateInterval($this->date_from, $this->date_to)) {
            $this->addError($attribute, 'Interval is not correct');
        }
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) : ActiveDataProvider
    {
        $table = RoomCategory::tableName();
        $query = RoomCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate() || empty($this->date_from) || empty($this->date_to)) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->from("(
            SELECT $table.*, (
                    SELECT COUNT(*) 
                    FROM bookings
                    WHERE room_category_id = $table.id AND 
                        (
                            (date_from <= '$this->date_from' AND date_to >= '$this->date_from')
                            OR
                            (date_from <= '$this->date_to' AND date_to >= '$this->date_to')
                            OR 
                            (date_from >= '$this->date_from' AND date_to <= '$this->date_to')
                        )               
                ) as bookingCount           
            FROM $table
        ) x");

        $query->andWhere("rooms_count > bookingCount");

        return $dataProvider;
    }
}
