
<div class="col-md-4 my-2 d-flex">
    <div class="card">
        <img src="<?= getArticleImagePath($article["image"]) ?>" class="card-img-top" alt="<?= htmlentities($article["title"]) ?>">
        <div class="card-body">
            <h5 class="card-title"><?= htmlentities($article["title"]) ?></h5>
            <a href="actualites-categorie.php?category_id=<?= htmlentities($article["category_id"]); ?>">
                <p class="card-category"><?= htmlentities($article["category_name"]) ?></p>
            </a>
            <p class="card-text"><?= htmlentities(substr($article['content'], 0, 100),) ?>
            <p>
                <a href="actualite.php?id=<?= htmlentities($article["id"]) ?>" class="btn btn-primary">Lire la suite</a>
        </div>
    </div>
</div>