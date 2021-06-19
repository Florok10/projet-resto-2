<?php
session_start();
 $restos = $_SESSION['AllResto'];
 require_once 'controllerResto.php';
 $title = 'Restaurants';
 require_once 'header.inc.php';

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
              <td><?= $resto['pictureResto'];?>" alt="Image du restaurant"></td>
              <td style="width=200;">
                <!-- pour que $_GET['id'] puisse récupèrer l'id via url pour la requete de la méthode voirResto -->
                <?php echo "<a class='btn btn-info' href='voirResto.php?id='.$resto[id_resto]>Voir</a>";?>
                <?= "<a class='btn btn-danger' href='reservResto.php?id='.$resto[id_resto]>Résever</a>";?>
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