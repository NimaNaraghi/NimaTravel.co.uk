<?php

namespace app\controllers;
use Yii;
use app\models\UserAccount;
use app\models\ChangePasswordForm;
use app\modules\payment\models\ManualPayment;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Profile;
use app\models\Buy;

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
                        'roles' => ['tourist'],
                    ],
                ],
            ],
        ];
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

    

}
