<?php
session_start();
 $restos = $_SESSION['AllResto'];
 require_once 'controllerResto.php';
//  require_once __DIR__ . 'controllerReservation.php';
 require_once 'header.inc.php';

?>

<main>
  <div class="album py-5 bg-light">
    <div class="container">


              

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($restos as $resto ): ?>
        <div class="col-3 col-6">
        <form class="col-3 col-6" action="controllerReservation.php" method="POST">
          <select class="form-select form-select-lg mb-3">
            <option selected value="">Choisissez ce restaurant</option>
            <option name="choixResto" value="<?= $resto["nameResto"]?>"><?= $resto["nameResto"]?></option>
          </select>
          <input type="datetime-local" id="datetime-local" name="date">
          <button class="btn btn-primary" type="submit" name="submitReservation">Réserver</button>
        </form>
          <div class="card shadow-sm" style="width: 22rem">
            <img class="bd-placeholder-img card-img-top" src="<?= $resto["pictureResto"]?>" alt="">
            <div class="card-body">
                <h1><?= $resto["nameResto"]?></h1>
              <p class="card-text"><?= $resto["typeResto"]?></p>
              <p class="card-text"><?= $resto["descriptionResto"]?></p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</main>

<?php

require_once 'footer.inc.php';

?>