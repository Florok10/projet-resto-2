<?php
session_start();
 require_once 'header.inc.php';
 require_once 'controllerResto.php';
 $restos = $_SESSION['AllResto'];
?>

<main>
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php foreach ($restos as $resto ): ?>
        <div class="col-3 col-6">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="<?= $resto["pictureResto"]?>" alt="">
            <div class="card-body">
                <h1><?= $resto["nameResto"]?></h1>
              <p class="card-text"><?= $resto["typeResto"]?></p>
              <p class="card-text"><?= $resto["descriptionResto"]?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
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