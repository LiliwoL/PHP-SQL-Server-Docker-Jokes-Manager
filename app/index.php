<?php
require_once 'config/config.php';
require_once 'inc/jokes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $category = $_POST['category'];
    addJoke($content, $category);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteJoke($id);
}

$jokes = getJokes();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestionnaire de Blagues</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Gestionnaire de Blagues</h1>

    <form method="POST" action="">
        <div class="form-group">
            <label for="content">Blague :</label>
            <input type="text" name="content" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category">Catégorie :</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter une blague</button>
    </form>

    <h2 class="mt-4">Liste des blagues :</h2>
    <ul class="list-group">
        <?php foreach ($jokes as $joke): ?>
            <li class="list-group-item">
                <?= $joke['contenu']; ?> (<?= $joke['categorie']; ?>)
                <a href="?delete=<?= $joke['id']; ?>" class="btn btn-danger btn-sm float-right">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
