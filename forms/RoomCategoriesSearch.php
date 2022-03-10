<?php

namespace app\forms;

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
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RoomCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }
}
