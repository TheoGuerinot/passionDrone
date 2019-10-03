

<?php require ('inc/header.php'); 
// require ('./inc/login.php');
?>


<h1 class="text-center mt-5 mb-4">Se connecter</h1>





<form action="./inc/login.php" method="POST" id="formLog">
    <div class="form-group">

      <label >Pseudo ou email</label>

      <input type="text" name="username" class="form-control" require  />


    </div>

    <div class="form-group">


      <label >Mot de passe <a href="forget.php"> (J'ai oublié mon mot de passe)</a></label>

      <input type="Password" name="password"class="form-control" require />


    </div>

    <div class="form-group">
      <label>
      <input type="checkbox" name="remember" value="1" require class="mb-3"> Se souvenir de moi
      </label><br>
        
      <button type="submit" class="btn btn-primary text-center mb-5" name='submit'>Se connecter</button>
       
  </form>
    </div>

   


<?php require ('inc/footer.php'); ?>
