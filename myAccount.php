<?php session_start();
require ('./inc/functions.php');
logged_only();
require "./inc/header.php";
require "./inc/account.php";
$user = $_SESSION['auth'];
require "./inc/db.php";
?>

      <h1 class="border border-info border-right-0 border-left-0 mt-5 pt-2 pb-3 text-center">Hello <?= $user->username ?> !</h1>

      <h3 class="text-white ml-5 mt-5 mb-5">Vos vidéos :</h3>

      <?php
      
      $req = $pdo->prepare("SELECT * FROM videos WHERE user_id = $user->id");
      $req->execute();
      $results = $req->fetchAll();
      
      ?>
<div class="container"id="containerAccount">
      <?php foreach($results as $result) : ?>

      <?php
      $vidId = $result->id;
      if ($result->video_category === 'beach') {
            $img = "img/beachCol.jpg";

      } else if ($result->video_category === 'city') {
            $img = "./img/cityCol.jpg";

      } else if ($result->video_category === 'mountains') {
            $img = "img/mountains.jpg./img/mountainsCol.jpg";

      } else if ($result->video_category === 'FPV') {
            $img = "./img/fpvCol.jpg";
      }
      ?>

      <div class="item">
            <h5 class="mt-0 text-center text-white mb-3" id="titleAcc"><?= $result->video_name; ?></h5>
            <a href="./player.php?v=<?= $result->id ?>">
                  <img src="<?= $img ?>" class="mr-3" alt="..." width="300px" height=200px;>
            </a>
            <div class="media-body mt-2">
                  <p class="text-white">
                        <?= substr($result->video_description, 0, 40) . " ... " ?>
                  <p/>
                  <p class="mb-5"><a href ="./delete.php?vidId=<?= $vidId ?>">Supprimer</a></p>
            </div>
      </div>
      <?php endforeach;?>
</div>
<h1 class="border border-info border-right-0 border-left-0 mt-3 pt-2 pb-3 text-center">Changer mon mot de passe</h1>
<form  action="" method="post" class="mt-5 mb-5" id="formChange">
      <div class="form-group">
      <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe"/>
      </div>
      <div class="form-group">
      <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe"/><br>
      <button  class="btn btn-primary">Envoyer</button>
      </div>
</form>
<?php require "./inc/footer.php"; 