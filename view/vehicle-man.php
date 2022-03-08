<?php

    if(!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2){
        header("Location: /phpmotors/");
        exit;
    }


    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors</title>


    <link rel="stylesheet" href="/phpmotors/stylesheet/Template.css">
</head>

<body>
    

    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>

    <main>
        <h1>Vehicle Management </h1>
        <ul>
            <li> <a href='/phpmotors/vehicles/?action=deliverClassificationForm'>Add Classification</a></li>
            <li> <a href='/phpmotors/vehicles/?action=deliverVehicleForm'>Vehicle</a></li>

        </ul>

    </main>
    <hr>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>