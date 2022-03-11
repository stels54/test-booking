<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';

?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'room_category_id',
            'date_from',
            'date_to',
            'customer_name',
            'customer_email:email',
            'create_dt',
        ],
    ]); ?>


</div>
