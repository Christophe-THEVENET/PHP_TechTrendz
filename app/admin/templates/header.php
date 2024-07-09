<?php

require_once __DIR__ . "/../../lib/config.php";
require_once __DIR__ . "/../../lib/session.php";

adminOnly();

$currentPage = basename($_SERVER['SCRIPT_NAME']); // index.php


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration TechTrendz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/override-bootstrap.css">
</head>

<body>

    <div class="container d-flex m-5">

        <header>
            <!-- ------------   sidebar ---------------- -->
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Administration</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/app/admin/index.php" class="nav-link <?= basename($_SERVER['SCRIPT_NAME']) === 'index.php' ? 'active' : "" ?>" aria-current="page">
                            <i class="bi bi-house me-2"></i>
                            Acceuil
                        </a>
                    </li>
                    <li>
                        <a href="/app/admin/articles.php" class="nav-link text-white  <?= basename($_SERVER['SCRIPT_NAME']) === 'articles.php' ? 'active' : "" ?>">
                            <i class="bi-table bi pe-none me-2"></i>
                            Articles
                        </a>
                    </li>
                </ul>
                <hr>
                <?php if (isset($_SESSION['user'])) { ?>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong> <?= $_SESSION['user']['first_name'] ?> </strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../logout.php">Sign out</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>

        </header>

        <main class="d-flex flex-column px-4">