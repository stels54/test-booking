<?php

namespace app\repositories;

use app\entities\RoomCategory;

class RoomCategoryRepository
{
    public function get($id): RoomCategory
    {
        return $this->getBy(['id' => $id]);
    }

    private function getBy(array $condition): RoomCategory
    {
        if (!$roomCategory = RoomCategory::find()->andWhere($condition)->limit(1)->one()) {
            throw new NotFoundException('Room Category not found.');
        }
        return $roomCategory;
    }
}