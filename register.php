<?php
include('inc/header.php');
require('inc/registration.php');
?>

    
<div>  
    <h1 class="text-center mt-5">S'inscrire</h1>

    <?php if(!empty($errors)): ?>

<div class="alert alert-danger">
<p>Vous n'avez pas remplis le formulaire correctement</p>
<ul>
<?php foreach ($errors as $error): ?>

    <li><?= $error; ?> </li>
<?php endforeach; ?>
</ul>

</div>


<?php endif; ?>
<div class="container" id="formReg">
    <form method="post" action="register.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="text" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input id="username" class="form-control" type="text" placeholder="Pseudo" name="username">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input id="password" class="form-control" type="password" placeholder="Mot de passe" name="password">
        </div>
        <div class="form-group">
            <label for="password_confirm">Mot de passe (Confirmation)</label>
        </div>
        <input id="password_confirm" class="form-control" type="password" placeholder="Mot de passe" name="password_confirm"><br>
            <input class="btn btn-primary btn_login mb-5" type="submit">
    </form>
</div>

<?php require "./inc/footer.php";