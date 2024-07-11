<?php


try {
    $pdo = new PDO("mysql:dbname=" . _DB_NAME_ . ";host=db;charset=utf8mb4", _DB_USER_, _DB_PASSWORD_);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
