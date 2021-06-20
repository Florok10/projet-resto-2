<?php
session_start();
require_once 'controller.php';
$users = $_SESSION['obj_user'];
require_once 'header.inc.php';
?>

<div class="container">
<form class="row g-3" method="POST" action="controller.php" enctype="multipart/form-data">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationDefault01"  name="nameResto" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Address</label>
    <input type="text" class="form-control" id="validationDefault02" name="addressResto" required>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <input class="form-control" type="file" id="formFile" name="pictureResto">
  </div>
  <div class="col-md-3">
    <label for="validationDefault04" class="form-label">Type</label>
    <select class="form-select" id="validationDefault04" required name="typeResto">
      <option selected disabled value="Italien">Italien</option>
      <option value="grec">Grec</option>
      <option value="fastFood">Fast Food</option>
      <option value="pizzeria">Pizzeria</option>
      <option value="asiatique">Asiatique</option>
    </select>
  </div>
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Description</label>
    <input type="text" class="form-control" id="validationDefault05" required name="descriptionResto">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
  </div>
</form>   
</div>
 
<?php

require_once 'footer.inc.php';
?>
