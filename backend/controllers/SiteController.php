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
use common\models\User;
use yii\web\NotFoundHttpException;
use backend\models\Joblist;
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User has been updated successfully.');
            return $this->redirect(['getuser', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id){
        echo "/n\$id-ajay 💀<pre>"; print_r($id); echo "\n</pre>";
        $model = $this->findModel($id);
        if($model->delete()){
            Yii::$app->session->setFlash('success', 'User has been removed successfully.');
            return $this->redirect(['getuser']);
            
        }
        else{
            echo "/n\$model-ajay 💀<pre>------------"; print_r($model); echo "\n</pre>";

        }
    }
    public function actionJoblist(){
        $model = new Joblist();
        $path = new Image();

        if($model->load(Yii::$app->request->post())){
            $path->path = UploadedFile::getInstance($path, 'path');
            if($model->save() && $path->upload('joblist')){
                Yii::$app->session->setFlash('success', 'Image uploaded successfully.');
                return $this->redirect(['site/image']); 
            }
        }
        return $this->render('joblist', [
            'model' => $model,
            'path' => $path,
        ]);
    }
    // ... Other methods ...

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
     public function actionGetuser(){
        $model = new User();
        return $this->render('getuser',['model' => $model]);
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
    public function actionLogin()
    {
        $model = new User(); // Assuming you have a User model

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Check if the user exists in the table
            $user = User::findOne(['username' => $model->username]);
            if($user){
            if ($model->password == $user->password) {
                Yii::$app->session->set('username',$model->username);
            ?>
                <script type="text/javascript">
                    alert('Welcome to Gotto! Find your dream job.');
                </script>
                <?php
                return $this->redirect(['/site/index']);
            } else {
                // User does not exist or password is incorrect
                ?>
                <script type="text/javascript">
                    alert('Wrong username or password. Please try again.');
                </script>
                <?php
            }
            }
            else {
                # code...  
                ?>
                <script type="text/javascript">
                    alert('Wrong username or password. Please try again.');
                </script>
                <?php
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->session->destroy();
        return $this->redirect(['site/index']); // Redirect to the homepage or any other page after logout
    }
}
