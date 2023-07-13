<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
 

    #top main div {
        display: grid;
        justify-content: center;
    }

    .user-register {
        background: aliceblue;
        padding: 2.5rem;
        border: 1px solid midnightblue;
        border-radius: 1rem;
        display: flex;
        width: fit-content;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        border: none;
    }

    .button {
        width: 100%;
        border: none;
        margin: 1rem 0rem;
        border-radius: 0.2rem;
        padding: 0.5rem;
    }
</style>
<h1>
    <?= Html::encode($this->title) ?>
</h1>

<div class="user-register">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>