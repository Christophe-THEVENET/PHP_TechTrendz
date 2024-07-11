<?php
require_once __DIR__ . "/app/templates/header.php";
require_once __DIR__ . "/app/lib/pdo.php";
require_once __DIR__ . "/app/lib/user.php";
require_once __DIR__ . "/app/lib/menu.php";

$errors = [];

if (isset($_POST["registerUser"])) {

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $errors[] = "Format d'email invalide.";
    }
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];

    try {
        $stmt = $pdo->prepare("INSERT INTO users (email, password, first_name, last_name, role) VALUES (:email, :password, :first_name, :last_name, :role)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            session_regenerate_id(true);
            $_SESSION["user"] = $user;

            if ($user["role"] === "user") {
                header("location: index.php");
            } elseif ($user["role"] === "admin") {
                header("location: /app/admin/admin.php");
            }
        } else {
            $errors[] = "Email ou mot de passe incorrect";
        }
    } catch (Exception $error) {
        $errors[] = "Impossible de s'enregistrer" . $error->getMessage();
    }
}

?>

<h1>Inscription</h1>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
<?php } ?>

<form method="post">
    <div class="mb-3">
        <label class="form-label" for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div>
        <label class="form-label" for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <div>
        <labelclass="form-label" for="first_name">Prénom:</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required>
    </div>
    <div>
        <label class="form-label" for="last_name">Nom:</label>
        <input type="text" id="last_name" name="last_name" class="form-control" required>
    </div>
    <div>
        <label class="form-label" for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <input type="submit" value="Inscription" name="registerUser" class="btn btn-primary">
</form>

<?php require_once __DIR__ . "/app/templates/footer.php"; ?>