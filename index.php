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
    ?>
    <h1> Velkommen til Fotballkits </h1>
    <h2> Populære fotballigaer</h2>
    <!-- Putter i en "container" for å få de på rekke -->
    <div class="container">
        <!-- Link til siden med drakt for fotballaget -->

        <?php
        include 'db.php';

        $sporring = "SELECT * FROM liga";
        $result = $tilkobling->query($sporring);
        while ($row = mysqli_fetch_array($result)) {
            vis_liga($row);
        }
        $tilkobling->close();

        function vis_liga($row)
        {
            $id = $row['id'];
            $navn = $row['navn'];
            $bilde = $row['bilde_url'];
            echo '<div class="polaroid">
            <a href="klubber.php?liga='.$id.'" title="' . $navn . '">
                <img height="250" src="bilder/ligaer/' . $bilde . '" alt="' . $navn . '" Logo" title="' . $navn . '" />
            </a>
            </div>';
        }
        ?>
    </div>
    <!-- Kontaktinfo -->
    <footer>
        <div class="footer-container">
            <h3>Kontaktinformasjon:</h3>
            <h3>Telefon: 12345678</h3>
            <h3>E-post: kontakt@fotballkits.no</h3>
            <h3>Adresse: Gateveien 1, 1234 Oslo</h3>
        </div>
    </footer>
</body>

</html>