<?php
session_start();

$file = 'compteur.txt';
$monfichier = fopen($file, 'r+');
ftruncate($monfichier,0);
fclose($monfichier);

session_destroy();

HEADER('Location: home.php');

?>