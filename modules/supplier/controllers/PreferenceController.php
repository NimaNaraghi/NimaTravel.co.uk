<?php

namespace app\modules\supplier\controllers;

use Yii;
use app\models\Preference;
use app\models\PreferenceSearch;
use app\modules\supplier\models\OfferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\supplier\models\Offer;
use app\modules\supplier\models\OfferImage;
use app\modules\supplier\models\Room;

/**
 * PreferenceController implements the CRUD actions for Preference model.
 */
class PreferenceController extends Controller
{
    const OFFER_STEP_ADD_OFFER = 0;
    const OFFER_STEP_ADD_ROOM = 1;
    const OFFER_STEP_ADD_PICTURE = 2;
    const OFFER_STEP_ADD_THINGS_TO_DO = 3;
    
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
                ],
            ],
        ];
    }

    /**
     * Lists all Preference models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PreferenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Preference model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $offerModel = new Offer();
        
        
        if ($offerModel->load(Yii::$app->request->post())) {
            $offerModel->preference_id = $id;
            $offerModel->setDates();
            
            if($offerModel->save()){
                return $this->redirect(['offer/view','id' => $offerModel->id]);
            }
        }
        
//        $offer = new Offer();
//        if ($offer->load(Yii::$app->request->post()) ){
//            $offer->offer_id = $id;
//            $offer->save();
//        }
        
        $offerSearch = new OfferSearch();
        $offerDataProvider = $offerSearch->search(Yii::$app->request->queryParams,['preferenceId' => $id]);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'offerModel' => $offerModel,
            'offerDataProvider' => $offerDataProvider,
            
        ]);
    }

    /**
     * Creates a new Preference model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Preference();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing Preference model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateOffer($id,$offerid)
    {
        $offerModel = $this->findOfferModel($offerid);
        $offerModel->setReadableDateRange();
        
        if ($offerModel->load(Yii::$app->request->post())) {
            $offerModel->preference_id = $id;
            $offerModel->setDates();
            
            if($offerModel->save()){
                return $this->redirect(['offer/view','id' => $offerModel->id]);
            }
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'offerModel' => $offerModel,
            
        ]);
    }

    /**
     * Deletes an existing Preference model.
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
     * Finds the Preference model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Preference the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Preference::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    protected function findOfferModel($id)
    {
        if (($model = Offer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
