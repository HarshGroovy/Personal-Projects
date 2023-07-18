<?php
use yii\data\ActiveDataProvider;
use common\models\User;
use yii\widgets\ListView;

// Get all POST parameters as an array
$postParams = Yii::$app->request->get('page');
$dataProvider  = new ActiveDataProvider([
    'query' => User::find(),
    'pagination' => [
        'page'              => $postParams,
        'pageParam'         => 'page',
        'defaultPageSize'   => 10,
        ]
   
]);
// $models     = $dataProvider->getModels();
?>
 <table class="table">  
  <thead class="thead-dark">
<tr>
<th scope="col">id</th>
  <th scope="col">username</th>
  <th scope="col">email</th>
  <th scope="col">password</th>
  <th scope="col">action</th>
</tr>
</thead>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_user',
    'itemOptions' => ['tag' => null],
    'summary' => false,
    'emptyText' => '<div class="text-center"><h3><b>Currently, no questions are available</b></h3></div>'
]);
?>
  </table>