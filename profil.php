<?php
require_once 'controllerLogin.php';
require_once 'header.inc.php';


$users = $_SESSION['obj_user'];
$reservations = $_SESSION['obj_reservation'];
$restos = $_SESSION['AllResto'];

// echo var_dump($users);
// echo $users["firstname"];

?>
<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="col-lg-6 profile mr-3"><img src="<?= $users["picture"]?>" class="img-fluid img-thumbnail"><a href="#" class="btn btn-link">Edit profile</a></div>
                    
                </div>
            </div>
         
            <div class="px-4 py-3">
                <h5 class="mb-0">A propos de vous</h5>
                <div class="p-4 rounded shadow-sm bg-light">
                    <p class="font-italic mb-0"><?= $users["firstname"]?></p>
                    <p class="font-italic mb-0"><?= $users["lastname"]?></p>
                    <p class="font-italic mb-0"><?= $users["email"]?></p>
                </div>
            </div>
            <!-- Reservations -->
            <?php foreach ($reservations as $reservation && $restos as $resto ): ?>
            <div class="px-5 py-5">
                <div class="card-body">
                <img class="bd-placeholder-img card-img-top" src="<?= $resto["pictureResto"]?>" alt="">
                    <h5 class="card-title"><?= $reservation['choixResto']?></h5>
                    <p class="card-text"><?= $resto["typeResto"]?></p>
                    <p class="card-text"><?= $resto['descriptionOfRestaurant']?></p>
                    <p class="card-text"><?= $reservation['date']?></p>
                </div>
            </div>
            <?php endforeach;?>

            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php

    require_once 'footer.inc.php';
    ?>