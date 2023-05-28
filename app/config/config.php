<?php
// Identifiants de connexion
$serverName = 'sql-server';     // Cf. docker-compose pour avoir le nom du container sql server
$database = 'gestionnaire_blagues';
$username = 'gestionnaire_user';
$password = 'YourUserPassword@2023';

// A ajouter au DSN pour se connecter au serveur sans SSL
$dsnEncryption = ";Encrypt=0;TrustServerCertificate=1";

try {
    // https://www.php.net/manual/en/ref.pdo-sqlsrv.connection.php
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database" . $dsnEncryption, $username, $password);

    // Configuration des Rapports d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à SQL Server !";
} catch (PDOException $e) {
    echo "Erreur de connexion à SQL Server : " . $e->getMessage();
}