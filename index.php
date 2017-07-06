<!DOCTYPE html>
<html>
<head>
	<title> Pinterst by Safia </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
</head>
<body>
	<h1> Pinterest by Safia </h1>
	<h2> Partage d'images sages </h2>
	<h3> Contribuez à la communauté de Pinterest by Safia en uploadant des images sages </h3>
	
	<form action="index.php" method="post" enctype="multipart/form-data">
		<input type="file" name="FileToUpload" id="FileToUpload" value="sélectionner l'image" class="btn btn-primary">
		<input type="submit" name="submit" value="envoyer l'image" class="btn btn-info">
	</form>


<div class="grid">

<?php

// permet de savoir que dans le $_FILES, il y a des informations en plus qu'on peut exploiter :
// echo $_FILES;
// echo "</br>";
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
// echo "</br>";
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";


$fichier = $_FILES['FileToUpload']['name']; //nom du fichier
$type0 = $_FILES['FileToUpload']['type']; //type et extension du fichier qui va s'afficher ex: image/.jpg
$type = str_replace("image/", "", $type0); //retirer le mot "image/" du string
$tmp = $_FILES['FileToUpload']['tmp_name']; //emplacement temporaire du fichier




echo $fichier; //affiche nom du fichier
echo "<br/>";
echo $type; //affiche le type du fichier
echo "<br/>";

//limite les types de fichiers aux images 
if(isset($_POST['submit'])) {

	if($type!="jpg" AND $type!="jpeg" AND $type!="png" AND $type!="gif" AND $type!="WebP"){
		echo "Seules les images de type jpg, jpeg, png, gif et WebP sont autorisées";
		
	}else {
		//le fichier envoyé étant stocké dans le $tmp, il faut le rediriger avec la fonction move_uploaded_file vers un autre chemin étant le dossier que je veux
	$destination="./dossier-images/";
	$nom_destination = "./dossier-images/".$fichier; // donner un nom de destination
	move_uploaded_file($tmp, $nom_destination); //fonction qui permet de changer la destination

		echo"image envoyée, merci ! ";
	}

}

//afficher les types d'erreur dans le $_FILES mais ça ne fonctionne pas, à creuser
// echo "<pre>";
// echo $_FILES['error'];
// echo "</pre>";

//utiliser la fonction scandir() afin de lire le contenu du dossier et le retourner en un tableau de fichier 
$contenu_dossier = scandir($destination);

echo "<pre>";
print_r($contenu_dossier);
echo "</pre>";

//afficher en html le contenu du dossier contenant les images grâce à la balise img

foreach ($contenu_dossier as $key => $value) {
	echo '<img src="' . $destination . $value .'">';
}


?>

</div>

</body>
</html>