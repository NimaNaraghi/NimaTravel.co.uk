<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionHow()
    {
        return $this->render('howitworks');
    }
    
    public function actionPis()
    {
        return $this->render('pis');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
           
            if ($user = $model->signup()) {
                //$this->confirm($user);
                if (Yii::$app->getUser()->login($user)) {
                    $email = $this->sendConfirmationEmail($user);
                    if($email){
                        Yii::$app->getSession()->setFlash('user',Yii::t('app','We sent you an email to active your account. Please, check your email!. Sometimes you may find it in SPAMS folder.'));
                    }
                    else{
                        Yii::$app->getSession()->setFlash('user',Yii::t('app','Signup failed. Please contact admin.'));
                    }
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    protected function sendConfirmationEmail($user)
    {
        return  \Yii::$app->mailer->compose(['html' => 'signupConfirmation-html'], ['user' => $user])
                ->setTo($user->email)
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                ->setSubject(Yii::t('app','Signup Confirmation'))
                ->setTextBody(Yii::t('app',"Click this link ").\yii\helpers\Html::a(Yii::t('app','confirm'),
                Yii::$app->urlManager->createAbsoluteUrl(['site/confirm','id'=>$user->id,'key'=>$user->auth_key])))
                ->send();
    }

    public function confirm($user)
    {

            $user->status = User::STATUS_ACTIVE;
            $auth = Yii::$app->authManager;
            
            $touristRole = $auth->getRole('tourist');
//            $touristRole = $auth->getRole('admin');
            $auth->assign($touristRole, $user->getId());
       
        return $user->save();
    }
    
    public function actionConfirm($id, $key)
    {
        $user = User::find()->where([
            'id'=>$id,
            'auth_key'=>$key,
            'status'=>User::STATUS_DELETED,
        ])->one();

        if(!empty($user)){
            $user->status = User::STATUS_ACTIVE;
            $auth = Yii::$app->authManager;
            
            $touristRole = $auth->getRole('tourist');
//            $touristRole = $auth->getRole('admin');
            $auth->assign($touristRole, $user->getId());
            
            $user->save();
            Yii::$app->getSession()->setFlash('user',Yii::t('app','Congratulations! Your account is active now!'));
        }
        else{
            Yii::$app->getSession()->setFlash('user',Yii::t('app','Sorry :( Something went wrong. Please, contact admin.'));
        }
        //$user->login();
        return $this->redirect(['user/user-home']);
    }

    
    


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {

        return $this->render('contact');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
