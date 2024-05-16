<?php
session_start();
//include ("db.php");
//$tilkobling->close();

// Hente eksisterende handlekurv eller opprette en tom
if (isset($_SESSION["handlekurv"])) {
    $kurv = $_SESSION["handlekurv"];
} else {
    // Ingen handlekurv så lager en tom en
    $kurv = array();
}

// Sjekker hvilken "action" som skal gjøres på handlekurven
if (isset($_POST["action"])) {
    $action = $_POST["action"];
    if ($action == "slett") {
        // Slette hele handlekurven
        $kurv = array();
    } elseif ($action == "bestill") {
        header("Location: bestilling.php");
        exit;
    } else {
        // Fjerne et produkt fra handlekurven
        $posisjon = intval($action);
        array_splice($kurv, $posisjon, 1);
    }
} else {
    // legger til et nytt produkt i handlekurven
    if (isset($_GET['produkt'])) {
        $produkt_id = $_GET['produkt'];
        $kurv[] = $produkt_id;
    }
}

// Lagrer handlekurven på session
$_SESSION["handlekurv"] = $kurv;

header("Location: handlekurv.php");
?>