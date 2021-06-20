<?php 
    session_start();
    require_once 'controllerResto.php';
    $_SESSION['obj_user'];
    $title = 'Réserver';
?>

<!DOCTYPE html>
<html lang="fr-FR">

    <body>
        <?php require_once 'header.inc.php'; ?>
        <div class=" d-flex flex-column col-3 m-4">
            <h1><?= $_GET['nameResto']?></h1>
            <img class="img-thumbnail" src="<?= $_GET['pictureResto']?>" alt="image_resto">
            <!-- <?= var_dump($_GET['pictureResto']); ?> -->
        </div>

<div class="container-fluid d-flex justify-content-center" style="margin-top:200px">
        <div class="row d-flex justify-content-center">
            
            <div class="col-10 d-flex justify-content-center">
            <form class="row g-3 d-flex flex-column" method="post" action="controllerReservation.php?id_user=<?= $_SESSION['obj_user']['id_user']?>">
                <div class="col-md-12">
                    <label for="res_date" class="form-label">Date</label>
                    <input type="date" class="form-control" name="dateBooking" value="">
                </div>
                
                <div class="col-md-12">
                    <label for="validationDefault03" class="form-label">Heure</label>
                    <input type="time" class="form-control" name="hourBooking">
                </div>

                <input type="hidden" name="id_resto" value="<?= $_GET['id_resto']?>">

                <div class="col-12 justify-content-center">
                    <button class="btn btn-success" type="submit" name="submit">Réserver</button>
                </div>

                <div class="col-12 justify-content-center">
                    <a class="btn btn-success" href="listResto.php">Retour à la liste</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?= require_once 'header.inc.php';?>
</body>
</html>