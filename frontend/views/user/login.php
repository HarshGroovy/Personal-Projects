<?php


/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #top main div {
        display: grid;
        justify-content: center;
        margin-top: 1rem;
    }

    #top main div .breadcrumb {

        position: absolute;
        left: 4rem;
    }

    #top main div h1 {
        display: none;
    }

    .user-login {
        background: aliceblue;
        padding: 2.5rem;
        /* border: 1px solid midnightblue; */
        border-radius: 1rem;
        display: flex;
        width: fit-content;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        border: none;
        font-size: 1.22rem;
    }

    .button {
        width: 100%;
        border: none;
        margin: 1rem 0rem;
        border-radius: 0.2rem;
        padding: 0.5rem;

        background: lightcoral;
        color: aliceblue;
        width: 15rem;
    }
    
</style>
<h1><?= Html::encode($this->title) ?></h1>

<div class="user-login">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
