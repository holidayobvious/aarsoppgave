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
    <title>Fotballkits.no</title>
</head>

<body>
    <!-- Meny for de forskjellige sidene -->
    <?php
    include 'meny.php';
    include 'db.php';
    $liga = 1;
    if (isset($_SESSION["liga"])) {
        $liga = $_SESSION["liga"];
    }
    if (isset($_GET["liga"])) {
        $liga = $_GET["liga"];
    }
    $_SESSION["liga"] = $liga;

    // Henter liganavn fra databasen
    $sporring = "SELECT navn FROM liga WHERE id=" . $liga;
    $result = $tilkobling->query($sporring);
    $row = mysqli_fetch_array($result);
    $liganavn = $row["navn"];
   
    echo '<h1>'. $liganavn . '</h1>';
    ?>
    <h2> Populære fotballag </h2>
    <!-- Putter i en "container" for å få de på rekke -->
    <div class="container">
        <!-- Link til siden med drakt for fotballaget -->

        <?php
        // Henter klubber for valgt liga
        $sporring = "SELECT * FROM klubb WHERE liga_id=" . $liga;
        $result = $tilkobling->query($sporring);
        while ($row = mysqli_fetch_array($result)) {
            vis_klubb($row);
        }
        $tilkobling->close();

        function vis_klubb($row)
        {
            $id = $row['id'];
            $navn = $row['navn'];
            $bilde = $row['bilde_url'];
            echo '<div class="polaroid">
            <a href="produkter.php?klubb='.$id.'" title="' . $navn . '">
                <img height="250" src="bilder/klubber/' . $bilde . '" alt="' . $navn . '" Logo" title="' . $navn . '" />
            </a>
            </div>';
        }
        ?>
    </div>
</body>

</html>