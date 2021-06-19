<?php 
    session_start();
    $_SESSION['idResto']=$_GET['id'];
    $title = 'Réserver';
    require_once 'header.inc.php';
?>

<div class="container-fluid d-flex justify-content-center" style="margin-top:200px">
        <div class="row d-flex justify-content-center">
            
            <div class="col-10 d-flex justify-content-center">
            <form class="row g-3 d-flex flex-column" method="post" action="controllerReservation.php">
                <div class="col-md-12">
                    <label for="res_date" class="form-label">Date</label>
                    <input type="date" class="form-control" name="res_date" value="">
                </div>
                
                <div class="col-md-12">
                    <label for="validationDefault03" class="form-label">Heure</label>
                    <input type="time" class="form-control" name="res_heure">
                </div>

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