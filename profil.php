<?php
require_once 'controllerLogin.php';
require_once 'header.inc.php';

$cookie_name = "ip";
$cookie_value = $_SERVER["REMOTE_ADDR"];
$cookie_ip = setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


$users = $_SESSION['obj_user'];
$reservations = $_SESSION['obj_reservation'];
$restos = $_SESSION['AllResto'];

// echo var_dump($users);
// echo $users["firstname"];

?>
<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">

        
        <div id="div_scroll" class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="col-lg-6 profile mr-3"><img src="<?= $users["picture"]?>" class="img-fluid img-thumbnail"><a href="#" class="btn btn-link">Edit profile</a></div>
                    
                </div>
            </div>
         
            <div id="profil_container" class="px-4 py-3">
                <h5 class="mb-0">A propos de vous</h5>
                <div class="p-4 rounded shadow-sm bg-light">
                    <p><?php echo (setcookie($cookie_value));?></p>
                    <p class="font-italic mb-0"><?= $users["firstname"]?></p>
                    <p class="font-italic mb-0"><?= $users["lastname"]?></p>
                    <p class="font-italic mb-0"><?= $users["email"]?></p>
                </div>
                <!-- Reservations -->
                <?php foreach ($reservations as $reservation): ?>
                <?php foreach ($restos as $resto):?>
                <div class="px-5 py-5">
                    <div class="card-body">
                    <img class="bd-placeholder-img card-img-top d-block m-auto" src="<?= $resto["pictureResto"]?>" alt="">
                        <h5 class="card-title"><?= $reservation['choixResto']?></h5>
                        <p class="card-text"><?= $resto["typeResto"]?></p>
                        <p class="card-text"><?= $resto['descriptionOfRestaurant']?></p>
                        <p class="card-text"><?= $reservation['date']?></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endforeach;?>
        </div>
    </div>
</div>

    <?php

    require_once 'footer.inc.php';
    ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js">
    </script>
    <script>
                var hiddenBox = $("#profil_container");
        $ ("#div_scroll").mouseover( function( event ){
            hiddenBox.slideDown();
        });
    </script>

    <!-- je ne trouve pas comment faire en sorte qu'une classe prenne dans sa classe les variables d'une autre classe-->