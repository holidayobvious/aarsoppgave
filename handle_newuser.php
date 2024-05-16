<?php
include("db.php");
// echo password_hash('passord123', PASSWORD_DEFAULT);

$passord = $_POST['passord'];
$passord2 = $_POST['passord2'];

if ($passord == $passord2){
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $email = $_POST['email'];
    $hash_password = password_hash($passord, PASSWORD_DEFAULT);
    $adresse = $_POST['adresse'];
    $postnummer = $_POST['postnummer'];
    $poststed = $_POST['poststed'];
    $sporring = "INSERT INTO kunde (fornavn, etternavn, email, passord, adresse, postnummer, poststed)";
    $sporring = $sporring . "VALUES ('$fornavn', '$etternavn', '$email', '$hash_password', '$adresse','$postnummer', '$poststed')";
    $result = $tilkobling->query($sporring);
    // sjekke $result om det skjedde noe feil
    // echo $sporring;
    echo "Takk $fornavn for at du ble kunde her hos Fotballkits! Ha en fin handletur!";   
} else {
    echo 'Pass på at passordene er skrevet likt!';
}

// if ($result->num_rows == 1) {
//     $row = mysqli_fetch_assoc($result);
//     $hash_password = $row['passord'];
//     if (password_verify($passord, $hash_password)) {
//         echo 'Innlogging vellykket!';
//     } else {
//         echo 'Feil passord';
//     }
//     // Legge til kode for å lagre innloggingen
// }

$tilkobling->close();
?>