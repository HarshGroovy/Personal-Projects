<?php

namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Joblist;

class JoblistController extends Controller
{
    public function actionIndex()
    {
        $joblist = Joblist::find()->all();
        return $this->render('index', ['joblist' => $joblist]);
    }
}
            