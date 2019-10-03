<?php require('inc/header.php');?>


<h1>Téléchargez votre vidéo</h1>

<form method="POST" action="recupUpload.php" id="videoForm" enctype="multipart/form-data">
  <div class="form-group" id="formName">
    <p>Veuillez sélectionner un fichier :</p>
  <input type="file" name="video" id="inputFile">
    <label for="name">Nom de votre vidéo</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Titre" required>
  </div>
  <div class="form-group">
    <label for="category">Choisissez une catégorie</label>
    <select name="category" class="form-control" id="category">
      <option value = "city">Villes</option>
      <option value = "beach">Plages</option>
      <option value = "mountains">Montagnes</option>
      <option value = "FPV">FPV</option>
    </select>
  </div>
  <div class="form-group">
    <label for="description">Description de la vidéo</label>
    <textarea name="video_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <input class="mb-5 btn btn-primary" type="submit" name="envoyer" value="Envoyer le fichier">
</form>




<?php 
require('inc/footer.php')
?> 