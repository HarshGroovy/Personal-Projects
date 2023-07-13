<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\User; // Assuming you have a User model

class UserController extends Controller
{
    public function actionRegister()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Save the user record to the database
            $model->save();

            // Redirect to the login page or any other page
            return $this->redirect(['user/login']);
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }
    public function actionLogin()
    {
        $model = new User(); // Assuming you have a User model

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Check if the user exists in the table
            $user = User::findOne(['username' => $model->username]);
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
?>