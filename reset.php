<?php include('inc/header.php');
?>


<h1>Réinitialiser mon mot de passe</h1>



<form action="./inc/reset.php" id="resetForm" method="POST">
<input type="hidden" name='id' value='<?= $_GET["id"]?>'>
<input type="hidden" name='reset_token' value='<?= $_GET["token"]?>'>

    <div class="form-group">

      <label >Mot de passe </label>

      <input type="Password" name="password"class="form-control" />

    </div>


    <div class="form-group">

      <label >Confirmation du Mot de passe</label>

      <input type="Password" name="password_confirm"class="form-control" />

    </div>

    <button type="submit" class="btn btn-primary" name='reset'>Réinitialiser mon mot de passe</button>
  </form>
