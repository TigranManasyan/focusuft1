<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Plan;
use app\helpers\Modal;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

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
        return $this->render('index');
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContactt()
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
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPricing()
    {

        $plans = Plan::find()->all();


        if (isset($plans[3])) {
            $plans[0] = $plans[3];
            $plans[0]->name = 'Starter';
            unset($plans[3]);
        }
        return $this->render('pricing-page', ['plans' => $plans]);
    }

    public function actionVideo()
    {
        return $this->render('video-page');
    }
    public function actionPrivacy(){

        return $this->render('privacy-policy');
    }

    public function actionContact(){


        $name = Yii::$app->request->post('name').' '
               .Yii::$app->request->post('surname');
        $email = Yii::$app->request->post('email');
        $subject = Yii::$app->request->post('subject');
        $text = Yii::$app->request->post('text');

        Yii::$app->mailer->compose()
            ->setFrom('testbook.sendmessage@gmail.com')
            ->setTo('testbook.sendmessage@gmail.com')
            ->setSubject(Yii::$app->request->post('subject'))
            ->setHtmlBody('<b>From- </b>'.$name.'<br> <b>Email- </b>'.$email.'<br> <b>Subject- </b>'.$subject.'<br> <b>Text</b> <br>'.$text)
            ->setTextBody($text)
            ->send();

        Modal::setRaw('Thank you', 'your submission has been sent');
//        Modal::setTitle('Thank you');
//        Modal::setBody('your submission has been sent');

        $this->redirect('/');

    }



}
