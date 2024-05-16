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
    <h1>Hjelp</h1>
    <h4>Her finner du:</h4>
    <details>
        <summary> FAQ </summary>
        <details>
            <summary> Hvordan oppreter jeg en bruker? </summary>
            <p>
                For å opprette en bruker trykker du på logg inn i menyen og under feltet hvor du skriver inn mail og
                passord
                så står det "Opprett bruker her", klikk på "her" og fyll ut alle feltene.
            </p>
        </details>
        <details>
            <summary> Feil ved inn logging </summary>
            <p>
                Hvis du får en feilmelding når du logger inn, burde du først sjekke at du har skrevet mailen
                og passordet ditt rett. Hvis du fortsatt får feil etter å ha sjekket at mail og passord er skrevet rett
                kan det hende
                at du ikke har registrert deg som bruker og da klikker du på "registrer deg her".
            </p>
        </details>
        <details>
            <summary> Glemt passord</summary>
            <p>
                Hvis du har glemt passordet ditt så må du opprette en ny bruker med en annen e-post adresse.
            </p>
        </details>
    </details>

    <details>
        <summary> Brukerstøtte </summary>
        <details>
            <summary> Video for brukerstøtte </summary>
            <p>
                legg til video her
            </p>
        </details>
        <details>
            <summary> PDF for brukerstøtte </summary>
            <p>
                link til pdf her
            </p>
        </details>
    </details>
</body>

</html>