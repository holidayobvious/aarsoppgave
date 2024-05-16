<?php
// Lettere å oppdatere og vedlikeholde koden
// Denne returnerer HTML-koden som skal til for å vise et produkt
// For å bruke den må man sende inn en rad fra tabellen
function vis_vare_linje($row)
{
    $produktnavn = $row["produktnavn"];
    $antall = $row["antall"];
    $pris = $row["pris"];
    $storrelse = $row["storrelse"];
    $total = $pris * $antall;
    echo "<p>$antall $produktnavn ($storrelse) $pris pr stykk = $total</p>";
}

function vis_produkt_i_handlekurv($row, $posisjon)
{
    $liga = ucfirst($row["liga"]);
    $klubb = ucfirst($row["klubb"]);
    $beskrivelse = 'Drakt i størrelse ' . $row["storrelse"] . ', fra '. $klubb.' i ' . $liga . '.';
    // Lager stor bokstav på produktnavnene
    $navn = ucfirst($row['produktnavn']);
    $id = $row['id'];
    echo '<div class="product">
    <p>#' . $id . ' ' . $navn . ' '. $beskrivelse . ' Pris: ' . $row["pris"] . ' kr
    <button type="submit" name="action" value="' . $posisjon . '"> Fjern produkt</button> </p> 
    </div>';
}
?>