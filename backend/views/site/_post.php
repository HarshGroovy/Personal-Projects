<style>
 td img{
    width: 24rem;
    height: 19rem;
    object-fit: cover;
    border-radius: 1rem;
  }
  </style>

  <table class="table">
  <thead class="thead-dark">
<tr>
<th scope="col">id</th>
  <th scope="col">assignid</th>
  <th scope="col">image</th>
  <th scope="col">Handle</th>
</tr>
</thead>
  <tbody>
  <?php
  if ($model->type == 'admin') { ?>
  
        <tr>                                        
        <td><?= $model->id ?></td>
          <td><?= $model->assign_id ?></td>
          <td><img src="<?= '/myproject/backend'.substr($model->path,2)?>"></td>
          <td><?= $model->type ?></td>
        </tr>
   
<?php
  }
?>
   </tbody>
    </table>