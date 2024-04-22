<?php require_once(__DIR__ . "/../../utils/variables.php") ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/./index.php">Site de recettes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/Etape2%20-%20Premier%20Site%20PHP/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Etape2%20-%20Premier%20Site%20PHP/views/contact.php">Contact</a>
                </li>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Etape2%20-%20Premier%20Site%20PHP/recipemanagement/recipes_create.php">Ajoutez une recette !</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/Etape2%20-%20Premier%20Site%20PHP/views/logout.php">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>