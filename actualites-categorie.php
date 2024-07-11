<?php

require_once __DIR__ . "/app/templates/header.php";
require_once __DIR__ . "/app/lib/pdo.php";

$error = false;

if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];
    $category = getCategoryById($pdo, $categoryId);
    $articlesByCategory = getArticlesByCategory($pdo, $categoryId);
    !$articlesByCategory ? $error = true : $error = false;
} else {
    $error = true;
}
if (!$error) { ?>
    <h1><?= $category['name'] ?></h1>
    <div class="row text-center">
        <?php foreach ($articlesByCategory as $key => $article) { ?>
            <?php require __DIR__ . "/app/templates/article_part.php"; ?>
        <?php } ?>
    </div>
<?php } else { ?>
    <h1>Articles introuvable</h1>
<?php } ?>

<?php require_once __DIR__ . "/app/templates/footer.php"; ?>