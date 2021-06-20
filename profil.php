<?php
require_once 'controllerLogin.php';
$title = 'Profil';

$cookie_name = "ip";
$cookie_value = $_SERVER["REMOTE_ADDR"];
$cookie_ip = setcookie($cookie_name, $cookie_value, time() + (3600 * 24), "/");

$reservations = $_SESSION['obj_reservation'];
$restos = $_SESSION['AllResto'];

require_once 'header.inc.php';

// echo var_dump($users);
// echo $users["firstname"];

?>
<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">

        
        <div id="div_scroll" class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="col-lg-6 profile mr-3"><img src="<?= $users["picture"]?>" class="img-thumbnail d-block mx-auto"><a href="#" class="btn btn-link">Modifier votre profil</a></div>
                    <div class="mb-0 text-center">Ici pour voir vos informations</div>
                </div>
            </div>
         
            <div id="profil_container" class="px-4 py-3">
                <h3 class="mb-4 text-center">A propos de vous</h5>
                <div class="p-4 rounded shadow-lg bg-light">
                    <p class="font-italic mb-1">Votre ip est :<?php echo ' ' . (setcookie($cookie_value));?></p>
                    <p class="font-italic mb-1">Prénom :<?= ' ' . $users["firstname"]?></p>
                    <p class="font-italic mb-1">Nom :<?= ' ' . $users["lastname"]?></p>
                    <p class="font-italic mb-1">Email :<?= ' ' . $users["email"]?></p>
                </div>
                <!-- Reservations -->
                <div class="px-5 py-5">
                    <h2 class="h2 text-center">Vos réservations</h2>
                    <div class="card-body">
                    <img class="bd-placeholder-img card-img-top d-block m-auto" src="<?= $resto["pictureResto"]?>" alt="">
                        <h5 class="card-title"><?= $reservation['choixResto']?></h5>
                    </div>
                </div>
            </div>
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