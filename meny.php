<?php
// Starter en session hvis ingen er startet
if(session_status() === PHP_SESSION_NONE) session_start();

// Henter ut meny data fra session eller henter det fra databasen hvis det ikke finnes
if (isset($_SESSION["meny"])) {
    $meny = $_SESSION["meny"];
} else {
    include 'db.php';
    $sporring =  " select klubb.id id, klubb.navn navn, liga.navn liga, liga.id liga_id from klubb, liga where klubb.liga_id = liga.id order by liga,navn;";
    $result = $tilkobling->query($sporring);
    $klubber = [];
    while ($row = mysqli_fetch_array($result)) {
        $klubber[] = $row;
    }
    $_SESSION["meny"] = $klubber;
    $meny = $klubber;
    $tilkobling->close();
}
?>

<div class="navbar">
    <a href="index.php">Hjem</a>
    <!-- Dropdown meny med de forskjellige lagene samlet, slik at det blir ryddigere-->
    <div class="dropdown">
        <button class="dropbtn">Drakter
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <div class="header">
                <h2>Fotballklubber </h2>
            </div>
            <div class="row">
                <?php
                $liga = "";
                foreach ($meny as $klubb) {
                    if ($klubb["liga"] != $liga) {
                        // Sjekk om vi må avslutte forrige liga
                        if ($liga != "") {
                            echo "</div>";
                        } 
                        // Starten på ny liga
                        $liga = $klubb["liga"];
                        echo '<div class="column">
                        <h3>'.$liga.'</h3>';
                    }
                    echo '<a href="produkter.php?klubb='.$klubb["id"].'&liga='.$klubb["liga_id"].'">'.$klubb["navn"].'</a>';
                }
                echo "</div>";
                ?>
            </div>
        </div>
    </div>
    <?php
    // Sjekker om brukeren er logget inn og er en admin
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
        echo '<a href="admin_oversikt.php">Oversikt</a>';
    }
    ?>
    <a href="logginn.php">Logg inn</a>
    <a href="hjelp.php">Hjelp</a>
    <a href="handlekurv.php">Handlekurv</a>
</div>
