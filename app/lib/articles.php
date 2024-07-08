<?php



$articles = [
    ['id'=> 1,'title' => 'toto', 'image' => null, 'head_title' => 'Accueil TechTrendz', 'meta_description' => 'TechTrendz page', 'content' => 'Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Proin eget tortor risus.'],
    ['id' => 2, 'title' => 'tata', 'image' => null, 'head_title' => 'Accueil TechTrendz', 'meta_description' => 'TechTrendz page', 'content' => 'Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Proin eget tortor risus.'],
    ['id' => 3, 'title' => 'titi', 'image' => null, 'head_title' => 'Accueil TechTrendz', 'meta_description' => 'TechTrendz page', 'content' => 'Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Proin eget tortor risus.']
];



function getArticleById(PDO $pdo, int $id): array|bool
{
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getArticles(PDO $pdo, int $limit = null, int $page = null): array|bool
{
    $sql = "SELECT * FROM articles ORDER BY id DESC";

    if ($limit && !$page) {
        $sql .= " LIMIT  :limit";
    }
    if ($limit && $page) {
        $sql .= " LIMIT :offest, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page - 1) * $limit;
        $query->bindValue(":offest", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getTotalArticles(PDO $pdo): int|bool
{
    $sql = "SELECT COUNT(*) as total FROM articles";
    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function saveArticle(PDO $pdo, string $title, string $content, string|null $image, int $category_id, int $id = null): bool
{
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO articles (title, content, image, category_id) "
            . "VALUES(:title, :content, :image, :category_id)");
    } else {
        $query = $pdo->prepare("UPDATE `articles` SET `title` = :title, "
            . "`content` = :content, "
            . "image = :image, category_id = :category_id WHERE `id` = :id;");

        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }

    $query->bindValue(':title', $title, $pdo::PARAM_STR);
    $query->bindValue(':content', $content, $pdo::PARAM_STR);
    $query->bindValue(':image', $image, $pdo::PARAM_STR);
    $query->bindValue(':category_id', $category_id, $pdo::PARAM_INT);
    return $query->execute();
}

function deleteArticle(PDO $pdo, int $id): bool
{

    $query = $pdo->prepare("DELETE FROM articles WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}