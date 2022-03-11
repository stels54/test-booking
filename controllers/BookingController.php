<?php

namespace app\controllers;

use app\entities\Booking;
use app\entities\RoomCategory;
use app\forms\BookingForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;
use app\services\BookingService;
use yii\web\NotFoundHttpException;

class BookingController extends Controller
{
    private $service;

    public function __construct($id, $module, BookingService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => Booking::find(),
            ])
        ]);
    }

    public function actionCreate($roomCategoryId, $dateFrom = null, $dateTo = null)
    {
        $form = new BookingForm();
        $form->date_from = $dateFrom;
        $form->date_to = $dateTo;

        $roomCategory = RoomCategory::findOne($roomCategoryId);

        if ($roomCategory === null) {
            throw new NotFoundHttpException('Room not found.');
        }

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->create($roomCategoryId, $form);
                Yii::$app->session->setFlash('info', 'Booking created');
                return $this->redirect(['site/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('create', [
            'roomCategory' => $roomCategory,
            'model' => $form,
        ]);
    }
}