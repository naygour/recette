<?php session_start(); 

include_once("config/mysql.php");
include_once("variables.php");
include_once("login.php");
include_once("functions.php");


$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
    echo 'Il faut un identifiant pour cette recette.';
    return;
}

$retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
$retrieveRecipeStatement->execute([
    'id' => $getData['id'],
]);
$recipe = $retrieveRecipeStatement->fetch();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>

    <h1>Mettre à jour la recette <?php echo($recipe['title']); ?></h1>   

    <form action="post_update.php" method="POST">
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label">Identifiant de la recette</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?>">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Titre de la recette</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" value="<?php echo($recipe['title']); ?>">
                </div>
                <div class="mb-3">
                    <label for="recipe" class="form-label">Description de la recette</label>
                    <textarea class="form-control" placeholder="Exprimez vous" id="recipe" name="recipe">
                        <?php echo strip_tags($recipe['recipe']);?>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <br />
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>