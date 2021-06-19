<?php
session_start();
 require_once 'controllerResto.php';
 require_once 'Resto.php';
 $title = 'Restaurants';
 require_once 'header.inc.php';
 $restos = $_SESSION['AllResto'];

?>

<main>
  <div class="album py-5 bg-light">
    <div class="container">


              

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
         <?php foreach ($restos as $resto ) : ?>       
            <tr>
              <td><?= $resto['nameResto'];?></td>
              <td><?= $resto['addressResto'];?></td>
              <td><?= $resto['typeResto'];?></td>
              <td><img href="<?= $resto['pictureResto'];?>" alt="Image du restaurant"></td>
              <td style="width=200;">
                <a class="btn btn-info" href="voirResto.php?id=`.<?php $resto['id_resto']?>`">Voir</a>
                <a class="btn btn-danger" href="reservResto.php?id=`.<?php $resto['id_resto']?>`">Résever</a>
              </td>
          </tr>
      <?php endforeach; ?>
      </div>
    </div>
  </div>

</main>

<?php

require_once 'footer.inc.php';

?>