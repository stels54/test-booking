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
            [
                'class' => ActionColumn::class,
                'template' => '{new_booking}',
                'buttons' => [
                    'new_booking' => function ($url, RoomCategory $model, $key) {
                        return Html::a(Html::button('Book!', ['class' => 'btn btn-success']), Url::toRoute(['booking/create', 'roomCategoryId' => $model->id]));
                        /*return Html::tag('div',
                            Html::a(Yii::t('app', '[View]'), Url::to(['articles/view', 'slug' => $model->slug]), ['class' => 'btn btn-primary', 'data-pjax' => 0]),
                            ['class' => 'text-right']
                        );*/
                    }
                ],
                /*'urlCreator' => function ($action, RoomCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }*/
            ],
        ],
    ]); ?>

</div>
