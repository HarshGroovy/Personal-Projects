<!-- views/user/view.php -->

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */


?>

<h1><?= Html::encode($this->title) ?></h1>
    <tbody>
        <tr>
            <td><?= $model->id ?></td>
            <td><?= $model->username ?></td>
            <td><?= $model->email ?></td>
            <td><?= $model->password ?></td>
            <td>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this user?']]) ?>
            </td>
        </tr>
    </tbody>
