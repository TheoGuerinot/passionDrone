<?php 

require ("./inc/header.php");
//MODEL
require './inc/db.php';
$currentCategory = isset($_GET['cat']) ? $_GET['cat'] : 1;
$req = $pdo->prepare('SELECT * FROM videos WHERE video_category = :currentCategory');
$req->execute([
  ':currentCategory' => $currentCategory
]);
$results = $req->fetchAll();
?>



<div class="container"id="containerAccount">
      <?php foreach($results as $result) : ?>

      <?php
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
            <h5 class="mt-5 text-center text-white" id="titleAcc"><?= $result->video_name; ?></h5>
            <a href="./player.php?v=<?= $result->id ?>">
                  <img src="<?= $img ?>" class="mr-3" alt="..." width="300px" height=200px;>
            </a>
            <div class="media-body">
                  <p class="text-white">
                        <?= substr($result->video_description, 0, 40) . " ... " ?>
                  <p/>
            </div>
      </div>
      <?php endforeach;?>
</div>



<?php require ("./inc/footer.php");?>
  