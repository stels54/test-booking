<?php

use yii\grid\GridView;

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
            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RoomCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],*/
        ],
    ]); ?>

</div>
