<?php 
require "./inc/db.php";
require "./inc/header.php";


$q = htmlspecialchars($_GET['q']);

if(isset($_GET['q']) AND !empty($_GET['q'])) {
    $s =explode(" ",$q);
    
    $req = $pdo->prepare('SELECT * FROM videos WHERE video_name LIKE "%' .$q. '%" ORDER BY id DESC');
    $req->execute();
    $results = $req->fetchAll();
}

else {
    echo "Aucun résultat";
}
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

      <div class="item mt-5 mb-5">
            <h5 class="mt-0 text-center text-white mb-3" id="titleAcc"><?= $result->video_name; ?></h5>
            <a href="./player.php?v=<?= $result->id ?>">
                  <img src="<?= $img ?>" class="mr-3" alt="..." width="300px" height=200px;>
            </a>
            <div class="media-body">
                  <p class="text-white mt-3">
                        <?= substr($result->video_description, 0, 40) . " ... " ?>
                  <p/>
            </div>
      </div>
      <?php endforeach;?>
</div>

<?php require "./inc/footer.php";
