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
    <!-- Meny for de forskjellige sidene -->
    <?php
    include 'db.php';
    include 'funksjoner.php';
    include 'meny.php';
    ?>
    <h1>Handlekurv</h1>
    <?php
    echo '<p>Hei ' . $_SESSION["kunde_navn"] . '! Her er alle produktene du har lagt til i handlekurven!</p>';
    ?>
    <form action="handle_handlekurv.php" method="post">
        <?php
        // Legger til nytt produkt i 
        if (isset($_SESSION["handlekurv"])) {
            $kurv = $_SESSION["handlekurv"];
            $posisjon = 0;
            if (count($kurv) > 0) {
                foreach ($kurv as $produkt_id) {
                    $sporring = "SELECT p.*, k.navn klubb, l.navn liga FROM produkt p, klubb k, liga l WHERE p.id=$produkt_id and p.klubb_id=k.id and k.liga_id=l.id";
                    $result = $tilkobling->query($sporring);
                    while ($row = mysqli_fetch_array($result)) {
                        vis_produkt_i_handlekurv($row, $posisjon++);
                    }
                }
                $tilkobling->close();
                vis_action_knapper();
            } else {
                echo "Handlekurven inneholder ingen produkter!";
            }
        } else {
            echo "Kom i gang med shoppingen!";
        }
        ?>
    </form>
    <?php
    function vis_action_knapper() {
        echo '<form action="handle_handlekurv.php" method="post">
            <button type="submit" name="action" value="slett"> Tøm handlekurv </button>
        </form>

        <form action="handle_handlekurv.php" method="post">
            <button type="submit" name="action" value="bestill"> Send bestilling </button>
        </form>';
    }
    ?>

    <!-- Sender tilbake til produktsiden du var på -->
    <button type="submit" onclick="location.href='produkter.php'" value="tilbake"> Tilbake til produktene </button>
</body>