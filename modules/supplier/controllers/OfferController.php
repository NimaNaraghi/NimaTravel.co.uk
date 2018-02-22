<?php

namespace app\modules\supplier\controllers;

use Yii;
use app\modules\supplier\models\Offer;
use app\modules\supplier\models\OfferSearch;
use app\modules\supplier\models\OfferImage;
use app\modules\supplier\models\OfferImageSearch;
use app\modules\supplier\models\Room;
use app\modules\supplier\models\RoomSearch;
use app\modules\supplier\models\ThingsToDo;
use app\modules\supplier\models\ThingsToDoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * OfferController implements the CRUD actions for Offer model.
 */
class OfferController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'deleteOfferImage' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Offer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OfferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Offer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $offerImage = new OfferImage();
        if ($offerImage->load(Yii::$app->request->post())){
            $offerImage->imageFile = UploadedFile::getInstance($offerImage, 'imageFile');
            $offerImage->offer_id = $id;
            $offerImage->save();
        }
        
        $offerImageSearch = new OfferImageSearch();
        $offerImageDataProvider = $offerImageSearch->search(Yii::$app->request->queryParams,['offerId' => $id]);
        //
        
        $room = new Room();
        if ($room->load(Yii::$app->request->post()) ){
            $room->offer_id = $id;
            $room->save();
        }
        
        $roomSearch = new RoomSearch();
        $roomDataProvider = $roomSearch->search(Yii::$app->request->queryParams,['offerId' => $id]);
        
        ///
        $thingsToDo = new ThingsToDo();
        
        if ($thingsToDo->load(Yii::$app->request->post()) ){
            $thingsToDo->imageFile = UploadedFile::getInstance($thingsToDo, 'imageFile');
            $thingsToDo->offer_id = $id;
            $thingsToDo->setDates();
            $thingsToDo->save();
        }
        
        $thingsToDoSearch = new ThingsToDoSearch();
        $thingsToDoDataProvider = $thingsToDoSearch->search(Yii::$app->request->queryParams,['offerId' => $id]);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'offerImage' => $offerImage,
            'offerImageDataProvider' => $offerImageDataProvider,
            'room' => $room,
            'roomDataProvider' => $roomDataProvider,
            'thingsToDo' => $thingsToDo,
            'thingsToDoDataProvider' => $thingsToDoDataProvider,
            
        ]);
    }
    
    public function actionDeleteOfferImage($id)
    {
        if (($model = OfferImage::findOne($id)) !== null) {
            $model->delete();
            $this->goBack();
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    public function actionDeleteRoom($id){
        if (($model = Room::findOne($id)) !== null) {
            $model->delete();
            $this->goBack();
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Creates a new Offer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Offer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Offer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Offer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Offer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Offer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Offer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
