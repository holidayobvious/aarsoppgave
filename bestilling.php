<?php
// Start the session, must be before HTML
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- Slik at knappene blir slik jeg vil ha de på denne siden -->
    <style>
        button {
            background-color: palevioletred;
            border: none;
            color: white;
            padding: 8px 25px;
            margin: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <title>Fotballkits.no</title>
</head>

<body>
    <?php
    include 'db.php';
    include 'funksjoner.php';
    include 'meny.php';

    $loggedin = $_SESSION['loggedin'];
    $kunde_id = $_SESSION['kunde_id'];

    // Oppretter ny bestilling
    $sporring = "INSERT INTO bestilling (kunde_id) VALUES ($kunde_id) returning id";
    $result = $tilkobling->query($sporring);
    while ($row = mysqli_fetch_array($result)) {
        $bestillings_nr = $row['id'];
    }

    echo "<h1>Bestillings nummer $bestillings_nr</h1>";

    echo '<p>Varene sendes i posten til ' . $_SESSION["kunde_navn"] . '! Velkommen igjen!</p>';
    ?>
    <?php
    // Legger til nytt produkt i 
    $kurv = $_SESSION["handlekurv"];
    // Går gjennom hnadlekurven og setter inn i databasen
    foreach ($kurv as $produkt_id) {
        $sporring = "INSERT INTO produkt_i_bestilling (produkt_id, bestilling_id) VALUES ($produkt_id, $bestillings_nr)";
        $result = $tilkobling->query($sporring);
    }

    // Henter ut bestillings info
    $sporring = "SELECT produkt.*, produkt_id, count(produkt_id) antall FROM produkt_i_bestilling, produkt WHERE bestilling_id=$bestillings_nr AND produkt.id=produkt_id GROUP BY produkt_id";
    $result = $tilkobling->query($sporring);
    $total = 0;
    while ($row = mysqli_fetch_array($result)) {
        vis_vare_linje($row);
        $antall = $row["antall"];
        $pris = $row["pris"];
        $total = $total + ($pris * $antall);
    }
    echo "<p>Totalt å betale $total kr</p>";
    $tilkobling->close();
    // Tømmer handlekurven, klar for ny bestilling
    $_SESSION["handlekurv"] = array();
    ?>

    <!-- Sender tilbake til produktsiden du var på -->
    <button type="submit" onclick="location.href='produkter.php'" value="tilbake"> Lag ny bestilling </button>
</body>