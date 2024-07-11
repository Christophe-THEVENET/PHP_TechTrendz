<?php

require_once __DIR__ . "/app/lib/config.php";
require_once __DIR__ . "/app/lib/pdo.php";
require_once __DIR__ . "/app/templates/header.php";

$articles = getArticles($pdo);

?>

<h1>TechTrendz Actualités</h1>
<div class="row text-center">
    <?php foreach ($articles as $key => $article) { ?>
        <?php require __DIR__ . "/app/templates/article_part.php"; ?>
    <?php } ?>

</div>

<?php require_once __DIR__ . "/app/templates/footer.php"; ?>