<?php
require_once __DIR__ . "/app/templates/header.php";
require_once __DIR__ . "/app/lib/pdo.php";
require_once __DIR__ . "/app/lib/user.php";
require_once __DIR__ . "/app/lib/menu.php";

$errors = [];

if (isset($_POST["loginUser"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = verifyUserLoginPassword($pdo, $email, $password);

    if ($user) {
        session_regenerate_id(true); // sécurité en cas de vol de cookie a chaque connexion l'id est regénéré.
        $_SESSION["user"] = $user;

        if ($user["role"] === "user") {
            header("location: index.php");
        } elseif ($user["role"] === "admin") {
            header("location: /app/admin/admin.php");
        }
    } else {
        $errors[] = "Email ou mot de passe incorrect";
    }
}
?>

<h1>Connexion</h1>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
<?php } ?>

<form method="post">
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <input type="submit" value="Connexion" name="loginUser" class="btn btn-primary">
</form>

<?php require_once __DIR__ . "/app/templates/footer.php"; ?>