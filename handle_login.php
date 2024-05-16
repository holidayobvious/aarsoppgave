<?php
session_start();

include("db.php");

$email = $_POST['email'];
$passord = $_POST['passord'];

// Spørring for å hente bruker fra kunde-tabellen
$sporring_kunde = "SELECT * FROM kunde WHERE email='$email'";
$result_kunde = $tilkobling->query($sporring_kunde);

if ($result_kunde->num_rows == 1) {
    // Brukeren er en admin-bruker
    // $row_kunde = $result_kunde->fetch_assoc();
    $row_kunde = mysqli_fetch_array($result_kunde);
    if (password_verify($passord, $row_kunde['passord'])) {
        // Innlogging vellykket, lagre innloggingstilstand og send til admin-oversikt
        $_SESSION['loggedin'] = true;
        $_SESSION['admin'] = false;
        $_SESSION['kunde_id'] = $row_kunde['id'];
        $_SESSION['kunde_navn'] = $row_kunde['fornavn']." ".$row_kunde['etternavn'];
        $admin = $row_kunde['admin'];
        $tilkobling->close();
        if ($admin == true) {
            $_SESSION['admin'] = true;
            header("location: admin_oversikt.php");
            exit;
        }  
        header("location: index.php");
        exit;
    }
} 
// Hvis brukeren ikke ble funnet i noen av tabellene eller passordet ikke stemmer
header("location: logginn.php?error=Brukernavn%20eller%20passord%20er%20feil");
exit;
?>
