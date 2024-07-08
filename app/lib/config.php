<?php

$dbConfig = parse_ini_file($_SERVER['DOCUMENT_ROOT']. '/.env');

define("_DOMAIN_", ".techtrendz.local");
define("_ARTICLES_IMAGES_FOLDER_", "/app/uploads/articles/");
define("_ASSETS_IMAGES_FOLDER_", "/app/assets/images/");
define("_ADMIN_ITEM_PER_PAGE_", 10);

define("_DB_NAME_", $dbConfig['MYSQL_DATABASE']);
define("_DB_USER_", $dbConfig['MYSQL_USER']);
define("_DB_PASSWORD_", $dbConfig['MYSQL_PASSWORD']);
define("_APP_EMAIL_", "techtrendz.test@gmail.com");
