<?php

require_once __DIR__ . "/app/lib/config.php";
require_once __DIR__ . "/app/lib/articles.php";

$error = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $article = $articles[$id - 1];

    require_once __DIR__ . "/app/lib/menu.php";

    $mainMenu['actualite.php'] = [
        'title' => $article['title'],
        'head_title' => $article['title'],
        'meta_description' => substr($article['content'], 0, 250),
        'exclude' => true
    ];
    /*   $article = getArticleById($pdo, $id); */

    if ($article["image"] === null) {
        $imagePath = _ASSETS_IMAGES_FOLDER_ . "default-article.jpg";
    } else {
        $imagePath =  _ARTICLES_IMAGES_FOLDER_ . $article["image"];
    }

    if (!$article) {
        $error = true;
    }
} else {
    $error = true;
}

require_once __DIR__ . "/app/templates/header.php";

?>


<?php if (!$error) { ?>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="<?= $imagePath; ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= htmlentities($article["title"]); ?></h1>
            <p class="lead"><?= htmlentities($article["content"]); ?></p>
        </div>
    </div>
<?php } else { ?>
    <h1>Article introuvable</h1>
<?php } ?>


<?php require_once __DIR__ . "/app/templates/footer.php"; ?>