<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use backend\models\Image;
$x = new Image();
$this->title = 'Add Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="image-upload">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'Title')->textInput() ?>

    <?= $form->field($model, 'location')->textInput() ?>
    <?= $form->field($model, 'date')->widget(DatePicker::class, [
    'options' => ['class' => 'form-control'],
    'dateFormat' => 'yyyy-MM-dd', // Format the date will be saved in the model
    // Additional widget options if needed
]) ?>

<?= $form->field($model, 'package')->textInput() ?>

    <?= $form->field($path,'path')->fileInput() ?>

    <?= $form->field($model,'position')->textInput() ?>
    <?= $form->field($model, 'type')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Upload', ['class' => 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
