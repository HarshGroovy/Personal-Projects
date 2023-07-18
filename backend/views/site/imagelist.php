<?php
use yii\data\ActiveDataProvider;
use backend\models\Image;
use yii\widgets\ListView;

// Get all POST parameters as an array
$postParams = Yii::$app->request->get('page');
$dataProvider  = new ActiveDataProvider([
    'query' => Image::find(),
    'pagination' => [
        'page'              => $postParams,
        'pageParam'         => 'page',
        'defaultPageSize'   => 1,
        ]
   
]);
// $models     = $dataProvider->getModels();
?>

<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_post',
    'itemOptions' => ['tag' => null],
    'summary' => false,
    'emptyText' => '<div class="text-center"><h3><b>Currently, no questions are available</b></h3></div>'
]);
?>
