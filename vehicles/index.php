<?php

session_start();

require_once '../library/connections.php';

require_once '../model/main-model.php';

require_once '../model/vehicles-model.php';

require_once '../library/function.php';



//Get the array of classifications
$classifications = getClassifications();
// $navList = navList($classifications);

// Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';
$navList = createNavList($classifications);




// Build classification selesct list Inside of our form.
// $classificationList = "<select name = 'classificationId' id ='classificationList'>";
// $classificationList  .= "<option>Choose a Classification</option>";
// foreach ($classifications as $classification) {

//     $classificationList .= "<option value=' $classification[classificationId]'";

//     if (isset($classificationId) && $classificationId == $classification['classificationId']) {
//         $classificationList .= "selected"; 

//     }
    
    
    // >$classification
//     $classificationList .= ">$classification[classificationName]</option>";
// }

// $classificationList .= '</select>';


$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL){
    $action = trim(filter_input(INPUT_GET, 'action',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
 }

echo $action;
switch ($action) {


    case "deliverClassificationForm":

        include   '../view/add-classification.php';


        break;


    case 'addClassification':
        $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($classificationName)) {
            $message = '<p class="center">Please provide information for all empty form fields.</p>';
            include   '../view/add-classification.php';
            exit;
        }

        // add to database
        $classifAdded = insertClassification($classificationName);

        if ($classifAdded) {
            header('Location: /phpmotors/vehicles/');
        } else {

            $message = '<p class = "center">An error occured while adding the new classification to the database, please try again later.</p>';
            include   '../view/add-classification.php';
            exit;
        }

        break;




    case 'deliverVehicleForm':

        include   '../view/add-vehicle.php';

        break;

    case 'addVehicle':

        $invMake = filter_input(INPUT_POST, "invMake", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // htmlspeacialchars() filter_sanitize_speacial_chars FILTER_SANITIZE_FULL_SPECIAL_CHARS
        $invModel = filter_input(INPUT_POST, "invModel", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invDescription = filter_input(INPUT_POST, "invDescription", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invImage = filter_input(INPUT_POST, "invImage", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invThumbnail = filter_input(INPUT_POST, "invThumbnail",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invPrice = filter_input(INPUT_POST, "invPrice",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, "invStock", FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, "invColor", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $classificationId = filter_input(INPUT_POST, "classificationId", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        if (
            empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription)
            || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) ||
            empty($invMake)
        ) {
            $message = '<p class="center"> Please provide information for all empty form fields.</p>';
            include "../view/add-vehicle.php";
            exit;
        }

        $vehicleAdded = insertVehicle(
            $invMake,
            $invModel,
            $invDescription,
            $invImage,
            $invThumbnail,
            $invPrice,
            $invStock,
            $invColor,
            $classificationId




        );


        if ($vehicleAdded) {

            $message = '<p class="center">The' . $invMake . '' . $invModel . ' was added Successfully!</p>';
            include "../view/add-vehicle.php";
            exit;
        } else {
            $message = '<p class="center"> Please Try Again Later</p>';
            include "../view/add-vehicle.php";
            exit;
        }


        break;

    default:

        include   '../view/vehicle-man.php';

        break;
}
