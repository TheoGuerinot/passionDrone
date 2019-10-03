<?php
if(session_status()=== PHP_SESSION_NONE){
    session_start();
  }
$user = $_SESSION['auth'];


// 1) Un fichier a-t-il été envoyé ?

if(!empty($_FILES['video']['tmp_name'])){
    if ($_FILES['video']['error'] == UPLOAD_ERR_NO_FILE) {

        echo "Aucun fichier n'a été envoyé";
     }
    // 2) Le fichier a-t-il été correctement uploadé ?

    if(is_uploaded_file($_FILES['video']['tmp_name'])){

        // 3) Le fichier a-t-il un type autorisé ?

        $typeMime = mime_content_type($_FILES['video']['tmp_name']);
        // echo "$typeMime";
        if ($typeMime == 'video/mp4') {

            // 4) Le fichier respecte t-il la taille limite ?

            $size = filesize($_FILES['video']['tmp_name']);
            
            if($size > 100000000){
                
                $message = "Le fichier ne doit pas dépasser 32 MO";

            } else {

                // 5) Nettoyage du nom de fichier

                $nameBeforeClean = $_POST['name'];

                // On remplace les caractères qui ne sont ni des lettres ni des nombres par un tiret

                $nameBeingClean = preg_replace('~[^\\pL\d]+~u', '-', $nameBeforeClean);

                // On retire les tirets en début et en fin de chaîne

                $nameBeingClean = trim($nameBeingClean, '-');

                // Pour éviter les problèmes d'encodage on passe d'un encodage UTF-8 à un encodage ASCII

                $nameBeingClean = iconv('utf-8', 'us-ascii//TRANSLIT', $nameBeingClean);

                // Pour uniformiser le nom des fichiers on met le nom en minuscule

                $nameBeingClean = strtolower($nameBeingClean);

                // On supprime les caractère indésirables

                $cleanName = preg_replace('~[^\\pL\d]+~u', '', $nameBeforeClean);

                // Chemin complet de destination (avec l'extension)

                $extension = substr(strrchr($_FILES['video']['name'], "."), 1);

                $finalPath = 'upload/'.$cleanName.'.'.$extension;

                // On peut maintenant déplacer le fichier avec le nouveau nom
    
                $moveIsOk = move_uploaded_file($_FILES['video']['tmp_name'], $finalPath);

                // Connexion à la base de donnée

                try {
                    $pdo = new PDO('mysql:dbname=passiondrone2;host=localhost', 'root', '');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                }

                catch(PDOException $e){
                    echo 'Echec : ' .$e->getMessage();
                }

                // On lie chaque marqueur à une valeur


                if ($moveIsOk) {
                    $message = "Le fichier a bien été uploadé !";


                    //Requete finale
                    //On utilise des marqueurs pour éviter les injections
                    //ça se note :marqueur
                    if(!empty($_POST['name']) || !empty($_POST['video_description'])) {
                        $req = $pdo->prepare('INSERT INTO videos SET video_name = :video_name, video_description = :video_description, video_category = :video_category, video_url = :video_url, user_id = :ouser_id');
                        $req->execute([
                            ":video_name" => $_POST['name'],
                            ":video_description" => $_POST['video_description'],
                            ":video_category" => $_POST['category'],
                            ":video_url" => $finalPath,
                            ":ouser_id" => $user->id
                        ]);
                        $message .= " & il est en bdd";
                        header("Location: ./myAccount.php");
                    } else {
                        $message = "Les champs sont pas bons";
                    }
                } else {
                    $message = "Suite à une erreur, le fichier n'a pas été déplacé dans" .$finalPath;
                }
            }


        } else {
                
            $message = "Il faut obligatoirement proposer un fichier au format mp4";
        }
    

    } else {

        $message = "Un problème a eu lieu lors de l'upload de la vidéo";
        }

} else {

    $message = "Aucun fichier à télécharger";
}

?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traitement du téléchargement</title>
</head>
<body>

    <h1>Upload</h1>

    <p><?= $message ?></p>

</body>
</html>
 

