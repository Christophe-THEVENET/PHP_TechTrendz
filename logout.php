<?php
session_start();
require_once __DIR__ . "/app/lib/config.php";
require_once __DIR__ . "/app/lib/session.php";

session_destroy();

unset($_SESSION);

header('location: index.php');
