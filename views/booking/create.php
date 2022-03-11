<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\entities\Booking */
/* @var $roomCategory app\entities\RoomCategory */

$this->title = 'You want to book: ' . $roomCategory->title;

?>

<div class="booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>