<?php

require_once __DIR__ . "/app/lib/article.php";
require_once __DIR__ . "/app/lib/config.php";

require_once __DIR__ . "/app/templates/header.php";

$articles = [['title' => 'toto',], ['title' => 'tata',], ['title' => 'titi',]];


/* $articles = getArticles($pdo); */

?>

<h1>TechTrendz Actualités</h1>
<?php

$articles = [
    ['id' => 1, 'title' => 'toto', 'image' => null],
    ['id' => 2, 'title' => 'tata', 'image' => null],
    ['id' => 3, 'title' => 'titi', 'image' => null]
]; 

?>
<div class="row text-center">
    <?php foreach ($articles as $key => $article) { ?>
        <?php require __DIR__ . "/app/templates/article_part.php"; ?>
    <?php } ?>

</div>

<?php require_once __DIR__ . "/app/templates/footer.php"; ?>