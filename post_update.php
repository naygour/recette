<?php 
session_start();

include_once('config/mysql.php');
include_once('login.php');
include_once('variables.php');
require("functions.php");

$postData = $_POST;

//Vérification du formulaire soumis
if ( !isset($postData['id']) || !isset($postData['title']) || !isset($postData['recipe']) )
{
    echo 'Il manque des informations.';
    return;
}

$id = $postData['id'];
$title = $postData['title'];
$recipe = $postData['recipe'];

$insertRecipe = $mysqlClient->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'id' => $id,
]); 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Recette ajouté</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Votre recette a bien été créée !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Titre</b> : <?php echo($title); ?></p>
                <p class="card-text"><b>Description</b> : <?php echo strip_tags($recipe); ?></p>
            </div>
        </div>
        </br>

        <button class="btn btn-primary" onclick="location.href='home.php'">Retourner à l'acceuil</button>
    
    <?php include_once('footer.php'); ?>
</body>
</html>