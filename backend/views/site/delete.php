<!-- views/user/update.php -->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="user-update">
    <?php $form = ActiveForm::begin(); ?>
    <?php Yii::$app->session->setFlash('Are you sure you want to delete this user!'); ?>
    <div class="form-group">
        <?= Html::submitButton('delete', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
