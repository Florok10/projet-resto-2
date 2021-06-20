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

    <div class="container" style="margin-top:150px;">
        <div class="row">

            <div class="col-6" style="margin-bottom:50px;">
                <img class="" src="<?= $_GET['pictureResto']?>" alt="image_resto">
                <?= var_dump($_GET['pictureResto']); ?>
            </div>

            <div class="col-6">
            <?= 
                // avec cette méthode on recupere id via url 
                $resto->voirResto();
                
            ?>
                <div class="col-md-4">
                    <!-- pour savoir quel id il faut aller chercher la description  -->
                    <h3>Description : <?= $resto['descriptionResto']?></h3><span><?php echo $resto->resto_description?></span>
                </div>
                            
                <div class="col-12 justify-content-center mb-1" style="margin-top:30px;"> 
                   <a href="listResto.php" class="btn btn-success">Retour à la liste des resrtaurants</a> 
                </div>

            </div>
        </div>
    </div>
    <?php

require_once 'footer.inc.php';

?>
</body>
</html>