
<?php

function getCategories($pdo)
{
    $sql = 'SELECT * FROM categories';
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getCategoryById(PDO $pdo, int $id): array|bool
{
    $query = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}
