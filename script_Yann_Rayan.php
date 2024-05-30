<?php
// Informations pour la connexion à la base de données
$servername = "localhost";  // Adresse du serveur de base de données
$username = "Yann";          // Nom d'utilisateur de la base de données
$password = "coucou";        // Mot de passe de la base de données
$dbname = "testDB_Yann_Rayan"; // Nom de la base de données

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si la connexion a échoué
if ($conn->connect_error) {
    // Afficher un message d'erreur et arrêter l'exécution du script
    die("Erreur de connection!". $conn->connect_error);
}

// Requête SQL pour sélectionner des données de la table "your_table"
$sql = "SELECT * FROM table_test";

// Exécuter la requête SQL
$result = $conn->query($sql);

// Vérifier s'il y a des lignes de résultat
if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
        // Afficher les données de chaque ligne
        echo "id: " . $row["id"]. "<br>";
    }
} else {
    // Si aucune ligne de résultat n'est retournée, afficher un message
    echo "0 results";
}

// Fermer la connexion à la base de données
$conn->close();
?>

