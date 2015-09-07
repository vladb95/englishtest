<?php
include '../app/controllers/adminController.php';
$admin=new adminController();
$model=$admin->getUserTop();
?>

<table class="hoverable">
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Item Name</th>
              <th data-field="price">Item Price</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($model as $row):?>
          <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['rate']?></td>
            <td><?=$row['email']?></td>
          </tr>
      <?php endforeach;?>
        </tbody>
      </table>