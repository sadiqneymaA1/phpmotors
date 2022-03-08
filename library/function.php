<?php


// function console_log($output, $with_script_tags = true) {
//     $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
//     if ($with_script_tags) {
//         $js_code = '<script>' . $js_code . '</script>';
//     }
    
//     echo $js_code;
// }



// function message($msg = ""){
//     if(!empty($msg)){
//         $_SESSION['message'] = $msg;
//         return true;
//     } else {
//         return $_SESSION['message'];
//     }
// }

// validate email
function checkEmail($clientEmail)
{

    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
    // return filter_var($checkedemail, Filter_validate_email)


}
// check a minimum of 8 charactetrs
// at least speacial key
// at least 1 cap letter

function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';

    return preg_match($pattern, $clientPassword);
}



function createNavList($classifications){

    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';

    return $navList;

}

?>
