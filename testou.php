<?php
$upload = 1;

if (!empty($_FILES)) {

    $image_name = $_FILES["new_image"]["name"];
    $image_tmp_name  = $_FILES["new_image"]["tmp_name"];
    $name_destination = "dossier-uploads";
    //c'est pour donner le meme nom et ne pas avoir le nom du fichier temporaire
    $image_path = $name_destination . "/" . $image_name;
    //c'est pour donner le meme nom
    $file_uploaded = move_uploaded_file($image_tmp_name, $image_path);

    if ($file_uploaded) {
        echo "le fichier est uploadé";
    } else {
        echo "oh, c'est pas bon";
    }
}

$type = $_FILES["new_image"]["type"];
if ($type != "jpg" AND $type != "jpeg" AND $type !="png" AND $type !="gif" AND $type !="WebP") {
  echo "recommencez l'upload, seuls les fichiers jpg, jpeg, png, gif et WebP sont autorisés";
}

echo scandir($name_destination);
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> pintertest</title>
  </head>
  <body>

    <form method="post" enctype="multipart/form-data">
      <div>
        <label>Sélectionnez l'image à uploader
          <input type="file" name="new_image">
        </label>
      </div>
      <br>
        <button type="submit" name="button"> Envoyer l'image</button>
    </form>

<?php
  print_r($_FILES);
 ?>

  </body>
</html>
