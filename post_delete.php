<?php 
session_start();

include_once('config/mysql.php');
include_once('login.php');
include_once('variables.php');
require("functions.php");

$postData = $_POST;

//Vérification du formulaire soumis
if ( !isset($postData['id']) )
{
    echo 'l\'identifiant est incorrect';
    return;
}

$id = $postData['id'];

$insertRecipe = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$insertRecipe->execute([
    'id' => $id,
]); 

header('Location: home.php');

?>