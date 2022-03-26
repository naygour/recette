<?php
session_start();

session_destroy();

$file = 'compteur.txt';
$monfichier = fopen($file, 'r+');
ftruncate($monfichier,0);
fclose($monfichier);

HEADER('Location: home.php');

?>