<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Fotballkits.no</title>
    <!-- Style her for at den skal være på riktig sted på akkurat denne siden -->
    <style>
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

        h5 {
            text-align: center;
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
    <h1>Logg inn</h1>
    <?php
    if (isset($_GET['error'])) {
        echo "Feilmelding:" . $_GET['error'];
    }
    
    ?>
    <div class="container">
        <!-- Inputfelt for innlogging -->
        <form action="handle_login.php" method="post">
            E-mail: <input type="email" name="email" required><br>
            Passord: <input type="password" name="passord" required><br>
            <input type="submit" value="Logg inn">
        </form>
    </div>
    <!-- Link til opprettbruker.php -->
    <h5>Ikke kunde? Opprett ny <a href="opprettbruker.php">her!</a></h5>
</body>

</html>