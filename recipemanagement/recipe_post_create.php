<?php
global $mysqlClient;
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/../config/database/mysql.php');
require_once(__DIR__ . '/../config/database/database_connect.php');
$postData = $_POST;

if (
    empty($postData['title'])
    || empty($postData['recipe'])
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['recipe'])) === ''
) {
    echo 'Il faut un titre et une recette pour soumettre le formulaire.';
    return;
}

$title = trim(strip_tags($postData['title']));
$recipe = trim(strip_tags($postData['recipe']));

$insertRecipe = $mysqlClient->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    'author' => $_SESSION['LOGGED_USER']['email'],
]);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container">

    <?php require_once(__DIR__ . '/../views/template/header.php'); ?>
    <h1>Recette ajoutée avec succès !</h1>

    <div class="card">

        <div class="card-body">
            <h5 class="card-title"><?php echo $title ; ?></h5>
            <p class="card-text"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
            <p class="card-text"><b>Recette</b> : <?php echo $recipe; ?></p>
        </div>
    </div>
</div>
<?php require_once(__DIR__ . '/../views/template/footer.php'); ?>
</body>
</html>
