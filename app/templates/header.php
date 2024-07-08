<?php

require_once __DIR__ . "./../lib/config.php";
require_once __DIR__ . "/../lib/pdo.php";

require_once __DIR__ . "./../lib/menu.php";
require_once __DIR__ . "./../lib/articles.php";



// info meta dynamique par page
$currentPage = basename($_SERVER['SCRIPT_NAME']); // index.php
// @ supprime pour debug warning

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $mainMenu[$currentPage]['head_title'] ?? ''  ?></title>
    <meta name="description" content="<?= $mainMenu[$currentPage]['meta_description'] ?? ''  ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php __DIR__ ?>/app/assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="<?php __DIR__ ?>/app/assets/css/style.css">
</head>

<body>

    <div class="container">

        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img width="150" src="/app/assets/images/logo-tech-trendz.png" alt="Logo TechTrendz">
                </a>
            </div>
            <ul class="nav nav-pills">
                <?php foreach ($mainMenu as $key => $menuItem) {
                    // ne pas ajouter la page d'un article dans le menu
                    if (!array_key_exists('exclude', $menuItem)) {  ?>
                        <li class="nav-item">
                            <a href="<?= $key; ?>" class="nav-link <?= basename($_SERVER['SCRIPT_NAME']) === $key ? 'active' : "" ?>"><?= $menuItem['title']; ?></a>
                        </li>
                <?php }
                } ?>
            </ul>

            <div class="col-md-3 text-end">
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="logout.php" class="btn btn-outline-primary me-2">Déconnexion</a>
                <?php } else { ?>
                    <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>
                    <a href="inscription.php" class="btn btn-primary">Inscription</a>
                <?php } ?>
            </div>
        </header>

        <main>