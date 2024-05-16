<?php
session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['admin']) {
    header("location: logginn.php");
    exit;
}

include("db.php");

// Hent bestillingene fra databasen
$sporring = "SELECT b.*, k.fornavn, k.etternavn, k.email FROM bestilling b, kunde k WHERE b.kunde_id = k.id";
$resultat = $tilkobling->query($sporring);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Oversikt</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include 'meny.php';
    ?>
    <h1>Admin Oversikt</h1>
    <h2>Bestillinger</h2>
    <?php
    if ($resultat && $resultat->num_rows > 0) {
    ?>
    <table border="1">
        <tr>
            <th>Bestilling ID</th>
            <th>Klokkeslett</th>
            <th>Kunde ID</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Email</th>
        </tr>
        <?php
            while ($rad = $resultat->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $rad['id'] . "</td>";
                echo "<td>" . $rad['bestillingstid'] . "</td>";
                echo "<td>" . $rad['kunde_id'] . "</td>";
                echo "<td>" . $rad['fornavn'] . "</td>";
                echo "<td>" . $rad['etternavn'] . "</td>";
                echo "<td>" . $rad['email'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <?php
    } else {
        echo "Ingen bestillinger funnet";
    }
    ?>
</body>
</html>