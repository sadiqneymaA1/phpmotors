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
        <h1 class="account-heading"> Sign in </h1>

        <?php


        if (isset($message)) {
            echo $message;
        }

        ?>

        <form method="POST" action="/phpmotors/accounts/index.php">
            <label for="email">Email</label>
            <input type="text" id="email" name="clientEmail"><br><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="clientPassword"><br><br>
            <input type="submit" value="Sign-in">
            <input type="hidden" name="action" value="LoginUser">






        </form>

        <p><a href="/phpmotors/accounts/index.php?action=deliverRegisterView" id="toreg">Not a member yet?</a>
        <p>



    </main>
    <hr>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>