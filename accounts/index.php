<?php

session_start();

require_once '../library/connections.php';

require_once '../model/main-model.php';

require_once '../library/function.php';

require_once '../model/accounts-model.php';


//Get the array of classifications
$classifications = getClassifications();
$navList = createNavList($classifications);

//Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';

$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL) {
    $action = trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}


switch ($action) {
    case 'deliverLoginView':
        include   '../view/login.php';
        break;

    case "deliverRegisterView":
        include  '../view/registeration.php';
        break;


    case 'register':
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // echo "$clientFirstname,$clientLastname,$clientEmail,$clientPassword";

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry '$clientFirstname', but the registration failed. Please try again.</p>";
            include '../view/registration.php'; 
            exit;
        }
        break;


    case 'LoginUser':
        // echo "<h1>Login route</h1>";
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordCheck = checkPassword($clientPassword);
        // echo "$clientEmail,$clientPassword";
        // exit;

        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view

        // echo '<pre>' . print_r($_SESSION['clientData'], true) . '</pre>';
        // exit;
        include '../view/admin.php';
        exit;

        break;


    



    case "logout":
        session_destroy();
        unset($_SESSION);
        setcookie('PHPSESSID', '', strtotime('-1 hour'), '/');
        header("Location: /phpmotors/");


    case 'deliverUpdateView':
        include '../view/client-update.php';
        break;

    case 'updateAccount':



        $clientFirstname = trim(filter_input(INPUT_POST, "clientFirstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // htmlspeacialchars() filter_sanitize_speacial_chars FILTER_SANITIZE_FULL_SPECIAL_CHARS
        $clientLastname = filter_input(INPUT_POST, "clientLastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientEmail = filter_input(INPUT_POST, "clientEmail", FILTER_SANITIZE_EMAIL); // htmlspeacialchars() filter_sanitize_speacial_chars FILTER_SANITIZE_FULL_SPECIAL_CHARS
        $clientId = filter_input(INPUT_POST, "clientId", FILTER_SANITIZE_NUMBER_INT);


        if ($clientEmail != $_SESSION['clientData']['clientEmail']){
            $clientEmail = checkEmail($clientEmail);

            $existingEmail = checkExistingEmail($clientEmail);

            if ($existingEmail){
                $_SESSION['message'] = '<p class= "notice">Please Provide information for all empty form fields.</p>';
                include '../view/client-update.php';
                exit;
            }

        }


        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
            $_SESSION['message'] = '<p class= "notice">Please Provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit;
        }

            $updateOutcome = updateClient($clientFirstname, $clientLastname, $clientEmail,$clientId);

            if ($updateOutcome){
                $_SESSION['clientData'] = getClientByID($clientId);
                $_SESSION['message'] = "<p class= 'notice'> $clientFirstname, Your Information has been Updated.</p>";
                header('Location: /phpmotors/accounts/');
                exit;


            } else{

                $_SESSION['message'] = "<p class= 'notice'> Sorry $clientFirstname, We could not update your account information. Please try again.</p>";
                include '../view/login.php';
                exit;
            }
            break;


        case 'updatePassword':
           

        $clientPassword = filter_input(INPUT_POST, "clientPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // htmlspeacialchars() filter_sanitize_speacial_chars FILTER_SANITIZE_FULL_SPECIAL_CHARS
        $clientId = filter_input(INPUT_POST, "clientId", FILTER_SANITIZE_NUMBER_INT);
        $checkPassword = checkPassword($clientPassword);

        

        // console_log($clientPassword);
        // console_log($clientId);
            

        if (empty($checkPassword)){
            $_SESSION['message'] = '<p class= "notice">Please Provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit;

        }

        // if (!empty($clientPassword) && $checkPassword){
        //     $_SESSION['message'] = '<p class= "notice">Please Provide information for all empty form fields.</p>';
        //     include '../view/client-update.php';
        //     exit;

        // }

            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

            $updatePass = updatePassword($hashedPassword, $clientId);

            // console_log($updatePass);

            if ($updatePass){
                $clientFirstname = $_SESSION['clientData']['clientFirstname'];
                $_SESSION['message'] = "<p class= 'notice'> $clientFirstname, Your password has been updated.</p>";
                header('Location: /phpmotors/accounts/');
                exit;
            } else {
                $_SESSION['message'] = '<p class= "notice"> An error occured and the password could not be updated.</p>';
                header('Location: /phpmotors/accounts/');
                exit;

            }
        break;


            




        

    default:
        include '../view/admin.php';
}

// unset($_SESSION['message']);
