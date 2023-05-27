<?php
function getJokes() {
    global $conn;
    $sql = "SELECT * FROM blagues";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $jokes = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $jokes[] = $row;
    }
    return $jokes;
}

function addJoke($content, $category) {
    global $conn;
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO blagues (contenu, categorie, date_ajout) VALUES (?, ?, ?)";
    $params = array($content, $category, $date);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}

function deleteJoke($id) {
    global $conn;
    $sql = "DELETE FROM blagues WHERE id = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
}
?>
