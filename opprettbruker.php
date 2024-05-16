<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Innlogging</title>
    <style>
        /* Passe på at stylen er der jeg vil ha den */
        form {
            background-color: lavenderblush;
            border-radius: 8px;
            box-shadow: grey;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: grey;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid grey;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: palevioletred;
            color: black;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: lightcoral;
        }
    </style>
</head>

<body>
    <!-- Meny for de forskjellige sidene -->
    <?php
    include 'meny.php';
    ?>
    <h1>Opprett ny kunde</h1>

    <div class="container">
            <!-- Inputfelt for innlogging -->
            <form action="handle_newuser.php" method="post">
                Fornavn: <input type="text" maxlength="45" name="fornavn" required><br>
                Etternavn: <input type="text" maxlength="45" name="etternavn" required><br>
                E-mail: <input type="email" maxlength="100" name="email" required><br>
                Passord: <input type="password" maxlength="255" name="passord" required><br>
                Gjenta passord: <input type="password" maxlength="255" name="passord2" required><br>
                Adresse: <input type="text" maxlength="45" name="adresse" required><br>
                Postnummer: <input type="text" maxlength="4" name="postnummer" required><br>
                Poststed: <input type="text" maxlength="45" name="poststed" required><br>
                <input type="submit" value="Opprett kunde">
            </form>
    </div>
</body>

</html>