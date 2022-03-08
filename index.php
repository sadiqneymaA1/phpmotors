<?php
session_start();

require_once '../phpmotors/library/connections.php';

require_once './model/main-model.php';

require_once './library/function.php';


//Get the array of classifications
$classifications = getClassifications();
$navList = createNavList($classifications);

//Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
//  }
//  $navList .= '</ul>';

$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL){
    $action = trim(filter_input(INPUT_GET, 'action',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
 }


 switch ($action){
    case 'template':
        include 'view/template.php';
     
     break;
    
    default:
     include 'view/home.php';
   }
?>