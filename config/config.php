<?php
$serverName = 'Nom_du_serveur_SQL_Server';
$connectionOptions = array(
    "Database" => "gestionnaire_blagues",
    "Uid" => "Nom_utilisateur_SQL_Server",
    "PWD" => "Mot_de_passe_SQL_Server"
);

// Établir la connexion
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}