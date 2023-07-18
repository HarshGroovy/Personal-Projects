<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use backend\models\Image;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::class,
            //     'rules' => [
            //         // [
            //         //     'actions' => ['login', 'error'],
            //         //     'allow' => true,
            //         // ],
            //         // [
            //         //     'actions' => ['logout', 'index'],
            //         //     'allow' => true,
            //         //     'roles' => ['@'],
            //         // ],
            //     ],
            // ],
            // 'verbs' => [
            //     'class' => VerbFilter::class,
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
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
    public function actionImagelist()
    {       
        $model = new Image();
        return $this->render('imagelist',['model' => $model]);
    }
    
    public function actionImage()
    {
        $model = new Image();

        if (Yii::$app->request->isPost) {
            $model->path = UploadedFile::getInstance($model, 'path');

            if ($model->upload()) {
                // Image uploaded successfully
                Yii::$app->session->setFlash('success', 'Image uploaded successfully.');
                return $this->redirect(['site/image']); // Redirect to the image listing page or any other page
            }
        }

        return $this->render('image', ['model' => $model]);
    }
    /**
     * Login action.
     *
     * @return string|Response
     */
    // public function actionLogin()
    // {
    //     // if (!Yii::$app->user->isGuest) {
    //     //     return $this->goHome();
    //     // }

    //     // $this->layout = 'blank';

    //     // $model = new LoginForm();
    //     // if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //     //     return $this->goBack();
    //     // }

    //     // $model->password = '';

    //     // return $this->render('login', [
    //     //     'model' => $model,
    //     // ]);
    // }

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
}
