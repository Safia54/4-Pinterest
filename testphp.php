<?php
//apprendre à sauvegarder un array avec la fonction serialiser
//Mais je n'y arrive pas 
// là où je l'ai vu : https://github.com/becodeorg/BXLAnderlecht/blob/master/06-PHP/PHP-Introduction.pdf

$array = [0=>"Bérénice", 1=>"Alexandra", 2=>"Alexandrie"];
$array[0] = "Bérénice";
$array[1] = "Alexandra";
$array[2] = "Alexandrie";
$str = serialize($array);
$arr = unserialize($array);
var_dump($arr);
?>