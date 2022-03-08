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

        <?php // Build classification selesct list Inside of our form
        $classificationList = "<select name = 'classificationId' id ='classificationList'>";
        $classificationList  .= "<option>Choose a Classification</option>";
        foreach ($classifications as $classification) {

            $classificationList .= "<option value=' $classification[classificationId]'";

            if (isset($classificationId) && $classificationId == $classification['classificationId']) {
                $classificationList .= "selected";
            }

            $classificationList .= ">$classification[classificationName]</options>";
        }
        $classificationList .= '</select>';


        ?>

    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>

    <main>


        <h1 class="account-heading"> Add Vehicle</h1>
        <?php

        if (isset($message)) {
            echo $message;
        }


        ?>

        <p class="center">Note all fields are Required</p>

        <form action="/phpmotors/vehicles/" method="post">
            <label for="classificationList">Classification</label>
            <?php echo $classificationList
            ?> <br><br>

            <!-- <?php

                    $classificationList = "<select name ='classificationId' id='classificationList'>";
                    $classificationList .=    "<option>Choose a Classification</option>";
                    foreach ($classifications as $classification) {
                        $classificationList .= "<option value = $classification[classificationId]>$classification[classificationId]>";
                    }
                    if (isset($classificationId) && $classificationId == $classification['classificationId']) {
                        echo "selected";
                    }
                    $classificationList .= "  </option>";


                    $classificationList .= "</select>";
                    ?> -->

            <labelk for="invMake">Make</labelk>
            <input type="text" name="invMake" id="invMake" required <?php if (isset($invMake)) {
                                                                        echo "value='$invMake'>";
                                                                    }  ?> <br><br><br>

            <label for="invModel">Model</label>
            <input type="text" name="invModel" id="invModel" required <?php if (isset($invModel)) {
                                                                            echo "value='$invModel'";
                                                                        } ?> br><br><br>

            <label for="invDescription">Description</label>
            <textarea id="invDescription" name="invDescription"> <?php if (isset($invDescription)) {
                                                                        echo  $invDescription;
                                                                    } ?></textarea> <br><br>


            <label for="invImage">Image Path</label>
            <input type="text" name="invImage" id="invImage" value=" /phpmotors/images/no-image.png" required <?php if (isset($invImage)) {
                                                                                                                    echo "value =' $invImage'";
                                                                                                                } ?> br><br><br><br>

            <label for="invThumbnail">Thumbnail Path</label>
            <input type="text" name="invThumbnail" id="invThumbnail" value=" /phpmotors/images/no-image.png" required <?php if (isset($invThumbnail)) {
                                                                                                                            echo "value =' $invThumbnail'";
                                                                                                                        } ?> br><br><br><br>

            <label for="invPrice">Price</label>
            <input type="number" name="invPrice" id="invPrice" required <?php if (isset($invPrice)) {
                                                                            echo "value =' $invPrice'";
                                                                        } ?> br><br><br><br>

            <label for="invStock"> # In Stock</label>
            <input type="text" name="invStock" id="invStock" required <?php if (isset($invStock)) {
                                                                            echo "value =' $invStock'";
                                                                        } ?> <br><br><br><br>

            <label for="invColor">Color</label>
            <input type="text" name="invColor" id="invColor" required <?php if (isset($invColor)) {
                                                                            echo "value =' $invColor'";
                                                                        } ?> <br><br> <br><br><br>


            <input type="submit" value="Add Vehicle">
            <input type="hidden" name="action" value="addVehicle"> <br><br>




        </form>
    </main>
    <hr>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>