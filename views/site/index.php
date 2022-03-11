<?php

use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\entities\RoomCategory;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\forms\RoomCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Booking';
?>
<div class="site-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'rooms_count',
            'bookingCount',
            [
                'class' => ActionColumn::class,
                'template' => '{new_booking}',
                'buttons' => [
                    'new_booking' => function ($url, RoomCategory $model) use ($searchModel) {
                        return Html::a(
                            Html::button('Book!', ['class' => 'btn btn-success']),
                            Url::toRoute(['booking/create', 'roomCategoryId' => $model->id, 'dateFrom' => $searchModel->date_from, 'dateTo' => $searchModel->date_to])
                        );
                    }
                ],
            ],
        ],
    ]); ?>

</div>
