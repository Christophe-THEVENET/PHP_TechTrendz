<?php


require_once __DIR__ . "/app/templates/header.php";



?>

<h1>TechTrendz Actualités</h1>
<?php


?>
<div class="row text-center">
    <?php foreach ($articles as $key => $article) { ?>
        <?php require __DIR__ . "/app/templates/article_part.php"; ?>
    <?php } ?>

</div>


<?php require_once __DIR__ . "/app/templates/footer.php"; ?>