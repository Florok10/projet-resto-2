<?php

require_once 'header.inc.php';
?>

<div class="container">
<form class="row g-3" method="POST" action="controllerInscription.php" enctype="multipart/form-data"> 
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Name</label>
    <input type="text" class="form-control" id="validationDefault01"  name="lastname" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Firstname</label>
    <input type="text" class="form-control" id="validationDefault01"  name="firstname" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Email</label>
    <input type="email" class="form-control" id="validationDefault02" name="email" required>
  </div>
 
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">password</label>
    <input type="password" class="form-control" id="validationDefault05" required name="password">
  </div>

  <div class="mb-3">
  <label for="picture" class="form-label">Photo de profil</label>
  <input class="form-control" type="file" id="picture" name="picture">
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