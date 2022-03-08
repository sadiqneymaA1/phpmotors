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
        <?php

        if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2) {
            header("Location: /phpmotors/");
            exit;
        }


        ?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>

    <main>

        <h1 class="account-heading"> Add Car Classification</h1>
        <?php

        if (isset($message)) {
            echo $message;
        }

        ?>

        <form action="/phpmotors/vehicles/" method="post">
            <label for="carClassification">Classification Name </label><br>
            <input type="text" name="classificationName" id="carClassification"> <br>


            <input type="submit" value="Add Classification">
            <input type="hidden" name="action" value="addClassification">

        </form>
        <hr>

        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>

        </footer>
    </main>
</body>

</html>