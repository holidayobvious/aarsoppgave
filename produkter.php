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
    $klubb = 1;
    if (isset($_SESSION["klubb"])) {
        $klubb = $_SESSION["klubb"];
    }
    if (isset($_GET["klubb"])) {
        $klubb = $_GET["klubb"];
    }
    $_SESSION["klubb"] = $klubb;

    // Henter klubbnavn fra databasen
    $sporring = "SELECT navn FROM klubb WHERE id=" . $klubb;
    $result = $tilkobling->query($sporring);
    $row = mysqli_fetch_array($result);
    $klubbnavn = $row["navn"];
   
    echo '<h1>'. $klubbnavn . '</h1>';
    ?>
    
    <!-- Putter i en "container" for å få de på rekke -->
    <div class="container">
        <!-- Link til siden med drakt for fotballaget -->

        <?php
        // Henter drakter for valgt klubb
        $sporring = "SELECT * FROM  produkt WHERE klubb_id=" . $klubb;
        $result = $tilkobling->query($sporring);
        while ($row = mysqli_fetch_array($result)) {
            vis_drakt($row);
        }
        $tilkobling->close();

        function vis_drakt($row)
        {    // Link til drakten slik at man kan kjøpe eller kunne direkte legge til i handlekurv(velge størrelse?)?
            $navn = $row['produktnavn'];
            $bilde = $row['bilde_url'];
            echo '<div class="polaroid">
            <a href="handle_handlekurv.php?produkt='.$row['id'].'" title="' . $navn . '">
                <img height="250" src="bilder/drakter/' . $bilde . '" alt="' . $navn . '" Logo" title="' . $navn . '" />
            </a>
            </div>';
        }
        ?>
    </div>
</body>

</html>