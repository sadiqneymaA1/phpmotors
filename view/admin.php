<!DOCTYPE html>

<?php

if (!isset($_SESSION['loggedin'])) {


    header('Location:/phpmotors/');
    exit;
    // do something here if the value is FALSE
    // The exclamation mark is a "negation" operator
    // By adding it the resulting test is reversed
    // This test is now "If Session loggedin value is NOT true"
}


?>
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
        <h1> Logged in as <?php echo $_SESSION['clientData']['clientFirstname'] . ' ' .  $_SESSION['clientData']['clientLastname']; ?> </h1>

        <?php

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>

        <ul>
            <li> First Name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
            <li> Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
            <li> Email Address: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
            <li> Client Level: <?php echo $_SESSION['clientData']['clientLevel']; ?></li>



        </ul>

        <a href="/phpmotors/accounts/?action=deliverUpdateView"> Update your information/change your password</a>

        <?php if ($_SESSION['clientData']['clientLevel'] > 1) { ?>

            <h3>Inventory Management</h3>

            <p> Use this Link to manage the inventory <?php ?></p>

            <p><a href="/phpmotors/vehicles/"> Vehicles Management </a></p>;
        <?php
        } ?>
    </main>


    <hr>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>