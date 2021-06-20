<?php
session_start();
require_once 'Resto.php';
 require_once 'controllerResto.php';
 $restos = $_SESSION['AllResto'];
 $title = 'Restaurants';
 require_once 'header.inc.php';

?>
<body>
<main>
  <div class="album py-5 bg-light">
    <div class="container">


              

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
         <?php foreach ($restos as $resto ) : ?>       
            <tr>
              <td><?= $resto['nameResto'];?></td><br>
              <td><?= $resto['addressResto'];?></td>
              <td><?= $resto['typeResto'];?></td><br>
              <td><img class="img-thumbnail" src="<?= $resto['pictureResto'];?>" alt="Image du restaurant"></td>
              <td style="width=200;">
                <a class="btn btn-info" href="voirResto.php?id=<?= $resto['id_resto']?>&nameResto=<?= $resto['nameResto']?>&pictureResto=<?= $resto['pictureResto']?>&typeResto=<?= $resto['typeResto']?>&descriptionResto=<?= $resto['descriptionResto']?>">Voir</a>
                <a class="btn btn-danger" href="nvReservation.php?id=<?= $resto['id_resto']?>&nameResto=<?= $resto['nameResto']?>&pictureResto=<?= $resto['pictureResto']?>&typeResto=<?= $resto['typeResto']?>&descriptionResto=<?= $resto['descriptionResto']?>">Résever</a>
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
</body>