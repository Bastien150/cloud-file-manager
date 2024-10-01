<?php
// Fonction de connexion à la base de données
function connect() {
    $dns = 'mysql:host=192.168.1.250;dbname=flashcard';
    $username = "root";
    $password = "root";
    try {
        $pdo = new PDO($dns, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        return null;
    }
}

// Tentative de connexion à la base de données
$pdo = connect();

// Vérification de la connexion
if ($pdo) {
    echo "Connexion réussie à la base de données !<br>";

    // Préparation et exécution de la requête SQL pour récupérer les données de la table 'chaise'
    try {
        $sql = "SELECT * FROM chaise";
        $stmt = $pdo->query($sql);

        // Vérification s'il y a des résultats
        if ($stmt->rowCount() > 0) {
            // Affichage des résultats
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nom</th><th>Description</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['front']) . "</td>";
                echo "<td>" . htmlspecialchars($row['back']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucune donnée trouvée dans la table 'chaise'.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des données : " . $e->getMessage();
    }
} else {
    echo "Échec de la connexion à la base de données.";
}

echo 'REMETTRE LE PAR FEU';
?>