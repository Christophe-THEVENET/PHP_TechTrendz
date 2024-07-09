<?php
session_start();
require_once __DIR__ . "/app/lib/config.php";

session_destroy();

unset($_SESSION);

header('location: index.php');
