<?php
/**
 * Récupération des blagues
 *
 * @return array
 */
function getJokes(): array
{
    global $conn;

    $query = "SELECT * FROM blagues";
    $stmt = $conn->query($query);

    if ($stmt === false) {
        die(print_r($conn->errorCode(), true));
    }else{
        $jokes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $jokes;
}

/**
 * Insert
 *
 * @param $content
 * @param $category
 * @return bool
 */
function addJoke($content, $category): bool
{
    global $conn;
    // Objet DateTime à insérer
    $dateTime = new DateTime();
    // Formater l'objet DateTime au format SQL Server datetime
    $formattedDateTime = $dateTime->format('Y-m-d\TH:i:s');

    $query = "INSERT INTO blagues (contenu, categorie, date_ajout) VALUES (?, ?, ?)";

    // Préparation de la requête
    $stmt = $conn->prepare($query);
    $result = $stmt->execute([$content, $category, $formattedDateTime]);

    if ($result === false) {
        die(print_r($conn->errorCode(), true));
    }

    return $result;
}

/**
 * Delete a joke
 * @param int $id
 * @return bool
 */
function deleteJoke(int $id): bool
{
    global $conn;
    $query = "DELETE FROM blagues WHERE id = ?";

    // Préparation de la requête
    $stmt = $conn->prepare($query);
    $result = $stmt->execute([$id]);

    if ($result === false) {
        die(print_r($conn->errorCode(), true));
    }

    return $result;
}
?>
