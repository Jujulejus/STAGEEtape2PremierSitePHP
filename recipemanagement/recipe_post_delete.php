<?php

global $mysqlClient;
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/../config/database/mysql.php');
require_once(__DIR__ . '/../config/database/database_connect.php');
require_once(__DIR__ . '/../utils/function.php');

$postData = $_POST;

if (!isset($postData['id']) || !is_numeric($postData['id'])) {
    echo 'Diantre ! Il faut être connecté pour ajouter une recette petit insolent.';
    return;
}

$deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$deleteRecipeStatement->execute([
    'id' => (int)$postData['id'],
]);

redirectToUrl( 'http://localhost/Etape2%20-%20Premier%20Site%20PHP/index.php');
