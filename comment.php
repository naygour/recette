<?php
    
include_once("config/mysql.php");
include_once("variables.php");
include_once("login.php");
include_once("functions.php");

?>

<form action="post_comment.php" method="POST">
    <h3>Votre commentaire :</h3>
    <div class="mb-3 visually-hidden">
        <input class="form-control" type="text" name="recipe_id" value="<?php echo($recipeId); ?>" />
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Donnez-lui une note (de 1 à 5)</label>
        <input type="number" class="form-control" id="review" name="review" min="0" max="5" step="1" />
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Postez un commentaire</label>
        <textarea class="form-control" placeholder="Soyez respectueux/se, nous sommes humain(e)s." id="comment" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>