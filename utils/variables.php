<?php
global $mysqlClient;
require_once(__DIR__ . '/../config/database/database_connect.php');

    $usersStatement = $mysqlClient->prepare('SELECT * FROM users');
    $usersStatement->execute();
    $users = $usersStatement->fetchAll();

    $recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE is_enabled is TRUE');
    $recipesStatement->execute();
    $recipes = $recipesStatement->fetchAll(); ?>