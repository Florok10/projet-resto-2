<?php 
    session_start();
    require_once 'DAO.php';
    require_once 'controllerResto.php';
    require_once 'Resto.php';
    $title = 'Détail';
    
    
    ?>

    


<!DOCTYPE html>
<html lang="fr-FR">
    <?php require_once 'header.inc.php' ?>
<body>

    <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 ">
                    <h1></h1>
                </div>
            </div>
    </div>

    <div class="container mb-5" style="margin-top:150px;">
        <div class="row">

            <div class=" d-flex flex-column col-7">
                <h1><?= $_GET['nameResto']?></h1>
                <img class="img-thumbnail" src="<?= $_GET['pictureResto']?>" alt="image_resto">
                <!-- <?= var_dump($_GET['pictureResto']); ?> -->
            </div>

            <div class="col-5">
                <div class="col-md-4">
                    <!-- pour savoir quel id il faut aller chercher la description  -->
                    <h3 class="h3">Description :</h3> <p class="font-size20"><?= $_GET['descriptionResto']?></p>
                    <p><?= $_GET['typeResto']?></p>
                </div>
                            
                <div class="col-12 justify-content-center mb-1" style="margin-top:30px;"> 
                   <a href="listResto.php" class="btn btn-success">Retour à la liste des resrtaurants</a>
                   <a class="btn btn-danger" href="nvReservation.php?id=<?= $_GET['id_resto']?>&nameResto=<?= $_GET['nameResto']?>&pictureResto=<?= $_GET['pictureResto']?>">Résever</a>
                </div>

            </div>
        </div>
    </div>
    <?php

require_once 'footer.inc.php';

?>
</body>
</html>