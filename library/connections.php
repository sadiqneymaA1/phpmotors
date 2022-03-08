<?php



function phpmotorsConnect()
{
    $server = "localhost";
    $dbname = "phpmotors";
    $username = 'IClient';
    $password = 'k6iCp8HScLsPdKs9';
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    // create the actual connection object and assign it to a variable

    try{
        $link = new PDO($dsn, $username, $password,$options);

        
        return $link;

    } catch(PDOException $e) {
        

        header('Location: /phpmotors/view/500.php');


        exit;

    }
}

    // Get vehicle information by invId
function getInvItemInfo($invId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
   }
