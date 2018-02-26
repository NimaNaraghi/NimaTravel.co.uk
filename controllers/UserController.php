<?php

namespace app\controllers;
use Yii;
use app\models\UserAccount;
use app\models\ChangePasswordForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Profile;
use app\models\Buy;
use app\models\Preference;
use app\modules\supplier\models\Offer;

class UserController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['tourist','admin'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionReaction($id, $action)
    {
        $offer = $this->findOffer($id);
        if($offer->preference->user_id == Yii::$app->user->identity->id){
            if($offer->updateStatus($action) != false){
                if($action == Offer::STATUS_RESERVE){
                    Yii::$app->getSession()->setFlash('user',
                        Yii::t('app','Thank you for letting us know that you would like to reserve the offer if the application was running as commercial website.'));
                }elseif($action == Offer::STATUS_CALL){
                    Yii::$app->getSession()->setFlash('user',
                        Yii::t('app','Thank you for letting us know that you would like to call the supplier if the application was running as commercial website.'));
                }
            }else{
                Yii::$app->getSession()->setFlash('user','It seems that you have already done this action. If it is not the case, contact the project\'s admins please :)');
            }
            return $this->goBack();
        }else{
           throw new \yii\web\ForbiddenHttpException;
        }
 
    }
    
    public function actionUserHome()
    {
        $preference = new Preference;
        
        if($preference->load(Yii::$app->request->post())){
//            $post = Yii::$app->request->post();
//            print_r(var_dump($preference->Climate));
//            die;
            $preference->setDates();
            if($preference->save()){
                $this->redirect(['user/offers','id' => $preference->id]);
            }
            
        }else{
            
        }
        
        return $this->render('userhome', [
            'preferenceForm' => $preference,
        ]);
    }
    
    public function actionOffers($id = null)
    {
        //select the last preference set as default
        if($id == null){
            $preference = Preference::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy('id')->one();
        }else{
            $preference = $this->findPreference($id);
        }

        
        //die(var_dump($preference));
        if($preference != null){
            $preferenceDataProvider = new ActiveDataProvider([
                'query' => Preference::find()->where(['user_id' => Yii::$app->user->identity->id])
            ]);
            
//            $query = $this->buildOfferQuery($id,$preference);
            
            $query = Offer::find()->where(['preference_id' => $preference->id]);
            $offerDataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        }
        
        
        return $this->render("user-offers",[
            'id' => $preference != null ? $preference->id : null,
            'offerDataProvider' => isset($offerDataProvider) ? $offerDataProvider : null,
            'preferenceDataProvider' => isset($preferenceDataProvider) ? $preferenceDataProvider : null,
            ]);
    }
    
    public function actionOffer($id, $preferenceid)
    {
        $offer = $this->findOffer($id);
        $preference = $this->findPreference($preferenceid);
        
        return $this->render("offer",[
            'offer' => $offer,
            'preference' => $preference,
        ]);
    }
    
    
    public function buildOfferQuery($id,$preference)
    {
        $query = Offer::find()
                ->joinWith('preference')
                ->leftJoin('preference_climate','preference_climate.preference_id = preference.id')
                ->leftJoin('climate','preference_climate.climate_id = climate.id')
                ->leftJoin('preference_activity','preference_activity.preference_id = preference.id')
                ->leftJoin('activity','preference_activity.activity_id = activity.id')
                ->leftJoin('preference_style','preference_style.preference_id = preference.id')
                ->leftJoin('style','preference_style.style_id = style.id');
                
        //print_r($preference->climates);
        $where = "";
        
        if(sizeof($preference->climates) > 0){
            $where = "(";
            $i = 0;
            foreach($preference->climates as $climate){
                //echo $climate->title;
                //$query->OrWhere(['preference_climate.climate_id' => $climate->id]);
                $where .= "preference_climate.climate_id=".$climate->id;
                $i++;
                if($i < sizeof($preference->climates)){
                    $where .= " OR ";
                }else{
                    $where .= ")";
                }


            }
            
        }
        if(sizeof($preference->activities) > 0){
            if($where != ""){
                $where .= " AND (";
            }else{
                $where = "(";
            }
            $i = 0;
            foreach($preference->activities as $activity){
                //echo $climate->title;
                //$query->OrWhere(['preference_climate.climate_id' => $climate->id]);
                $where .= "preference_activity.activity_id=".$activity->id;
                $i++;
                if($i < sizeof($preference->activities)){
                    $where .= " OR ";
                }else{
                    $where .= ")";
                }

            }

            
        }
        if(sizeof($preference->styles) > 0){
             if($where != ""){
                $where .= " AND (";
            }else{
                $where = "(";
            }
            $i = 0;
            foreach($preference->styles as $style){
                //echo $climate->title;
                //$query->OrWhere(['preference_climate.climate_id' => $climate->id]);
                $where .= "preference_style.style_id=".$style->id;
                $i++;
                if($i < sizeof($preference->styles)){
                    $where .= " OR ";
                }else{
                    $where .= ")";
                }
            }
        }
        if(!empty($where)){
            $where .= ";";
            $query->where($where);
        }
        return $query;
    }

    public function actionAccount()
    {
    	$model = UserAccount::findOne(Yii::$app->user->identity->id);
    	
    	if($model->load(Yii::$app->request->post()) AND $model->save()){
            Yii::$app->getSession()->setFlash('success_change',Yii::t('app','Your Account Updated!'));
    	}
        
        return $this->render('account',[
        	'model' => $model,
                
        ]);
    }
    
    public function actionProfile() {
        
        $user_id = Yii::$app->user->identity->id;
        $user = User::findOne($user_id);
        
        if($user != null && $user instanceof User){
            
            $model = $user->profile;
            if($model->load(Yii::$app->request->post())){
                if($model->save() != false){
                    Yii::$app->getSession()->setFlash('user',Yii::t('app','Changes saved successfuly!'));
                }
            }
            
            return $this->render('profile',['model' => $model]);
            
        }else{
            Yii::$app->getSession()->setFlash('user',Yii::t('app','Sorry we could not find your profile. Please, call admin.'));
            return $this->goHome();
        }
    }
    
    
    public function actionHistory() {
        $user_id = Yii::$app->user->identity->id;
        $user = User::findOne($user_id);
        
        $query = Buy::find()->where(['user_id' => $user->id]);
        
        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $this->render('history',['provider' => $provider]);
        
    }
    
    public function actionPassword()
    {
        $model = new ChangePasswordForm();

        if($model->load(Yii::$app->request->post()) AND $model->changePassword()){
            Yii::$app->getSession()->setFlash('success_change',Yii::t('app','Your Password Updated!'));
            Yii::$app->user->logout();
            return $this->goHome();
        }
        return $this->render('password',[
        	'model' => $model,
                
        ]);
    }

    protected function findPreference($id)
    {
        if (($model = Preference::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    protected function findOffer($id)
    {
        if (($model = Offer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
