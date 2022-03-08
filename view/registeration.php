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

        <h1 class="account-heading"> Register </h1>

        <?php


        if (isset($message)) {
            echo $message;
        }

        ?>

        <form method="POST" action="/phpmotors/accounts/index.php">

            <label for="clientFirstname">First Name</label>
                <input type="text" name="clientFirstname" id="clientFirstname" required <?php if (isset($clientFirstname)){echo "value='$clientFirstname'";}?>> <br> <br>
            <label for="clientLastname">Last Name </label>
                <input type="text" name="clientLastname" id="clientLastname"required <?php if (isset($clientLastname)){echo "value='$clientLastname'";}?>> <br><br>
            <label for="clientEmail">Email </label>
                <input type="email" name="clientEmail" id="clientEmail"required <?php if (isset($clientEmail)){echo "value='$clientEmail'";}?>> <br> <br>
            <span> Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> <br>
            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?>^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.[a-z])."$">
            <label for="clientPassword">Password </label><br>

            <input type="hidden" name="action" value="register"> 


            <!-- <input type="password" name="clientPassword" id="clientPassword"> <br> <br> -->
            <input type="submit" value="Register">


        </form>


    </main>
    <hr>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>