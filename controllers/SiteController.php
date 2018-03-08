<?php

namespace app\controllers;

use app\models\MailIdentity;
use app\models\RegistrationForm;
use app\models\UserIdentity;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (yii::$app->user->isGuest) return $this->actionLogin();
        $u = UserIdentity::findOne(yii::$app->user->id);
        return $this->render('index',['user' => $u]);
    }

    /**
     * Login action.
     *
     * @return Response|string
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

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegistration()
    {
        $model = new RegistrationForm();
        //var_dump(Yii::$app->request->post('RegistrationForm')['username']);die;
        if (yii::$app->request->post('RegistrationForm'))
        {
            $model->attributes = Yii::$app->request->post('RegistrationForm');
            if ($model->validate())
            {
                $model->signup();
                mkdir("./UsersFiles/".md5(Yii::$app->request->post('RegistrationForm')['username']), 0700);
                mkdir("./UsersFiles/".md5(Yii::$app->request->post('RegistrationForm')['username']).'/photo', 0700);
                mkdir("./UsersFiles/".md5(Yii::$app->request->post('RegistrationForm')['username']).'/music', 0700);
                mkdir("./UsersFiles/".md5(Yii::$app->request->post('RegistrationForm')['username']).'/video', 0700);
                return $this->actionLogin();
            }
        }
        return $this->render('registration',['model' => $model]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionMail()
    {
        if (yii::$app->user->isGuest) return $this->actionLogin();
        $u = UserIdentity::findOne(yii::$app->user->id);
        $mail = MailIdentity::findGroup($u->id);
//        $fp = fsockopen('localhost',80);
//        if ($fp)
//        {
//            fputs(
//                $fp,"GET /test_sock.php HTTP/1.0
//                            User-Agent: У меня Firefox 1.5 и Windows XP
//                            Referer: Я пришёл с php.net
//                            Cookie: test=test_cookie;"
//
//            );
//        }
        return $this->render('mail',['user' => $u,'mail' => $mail]);
    }
}
