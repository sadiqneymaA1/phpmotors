<?php


    if(!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2){
        header("Location: /phpmotors/");
        exit;
    }


?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>

<?php




// Build the classifications option list
$classificationList = '<select name="classificationId" id="classificationId">';
$classificationList .= "<option>Choose a Car Classification</option>";
foreach ($carClassifications as $classification) {
 $classificationList .= "<option value='$classification[classificationId]'";
 if(isset($classificationId)){
  if($classification['classificationId'] === $classificationId){
   $classificationList .= ' selected ';
  }
 } elseif(isset($invInfo['classificationId'])){
 if($classification['classificationId'] === $invInfo['classificationId']){
  $classificationList .= ' selected ';
 }
}
$classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?>

<h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	echo "Modify $invInfo[invMake] $invInfo[invModel]";
    } 
    else if(isset($invMake) && isset($invModel)) { 
	echo "Modify$invMake $invModel"; }?>
    
</h1>

<?php if (isset($message)){
    echo $message;
}
?>

<p class="center"> Note all Fields are Required</p>

<?php

$classificationList = "<select name ='classificationId' id='classificationList'>";
                    $classificationList .=    "<option>Choose a Classification</option>";
                    foreach ($classifications as $classification) {
                        $classificationList .= "<option value = $classification[classificationId]>$classification[classificationId]";
                    
                    if (isset($classificationId) && $classificationId == $classification['classificationId']) {
                        echo "selected";
                    }
                    elseif (isset($invInfo['$classificationId']) && $classification['classificationId'] === $invInfo
                    ['classificationid']){
                        echo "selected";
                    }

                    }  echo 
                    ">$classification[classificationName]</option>"
      ?>

    <label for="invMake">Make</label>
            <input type="text" name="invMake" id="invMake" required <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } 
                                                                        elseif (isset($invInfo['invMake'])){
                                                                            echo "value = '$invInfo[invMake]'";

                                                                        }
                                                                        
                                                                        ?> br><br><br>


<label for="invModel">Model</label>
            <input type="text" name="invModel" id="invModel" required <?php if (isset($invModel)) {
                                                                            echo "value='$invModel'";
                                                                        } 
                                                                        elseif (isset($invInfo['invModel'])){
                                                                            echo "value = '$invInfo[invModel]'";
                                                                            
                                                                        }
                                                                        
                                                                        ?> br><br><br>


<label for="invDescription">Description</label>
            <textarea id="invDescription" name="invDescription" required <?php if (isset($invDescription)) {
                                                                            echo "value='$invDescription'";
                                                                        } 
                                                                        elseif (isset($invInfo['invDescription'])){
                                                                            echo "value = '$invInfo[invDescription]'";
                                                                            
                                                                            
                                                                        }
                                                                        
                                                                        ?>  </textarea  br><br><br>


<label for="invImage">Image Path</label>
            <input type="text" name="invImage" id="invImage" value="/phpmotors/images/no-image.png" required <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } 
                                                                        elseif (isset($invInfo['invImage'])){
                                                                            echo "value = '$invInfo[invImage]'";
                                                                            
                                                                        }
                                                                        
                                                                        ?> br><br><br>


<label for="invThumbnail">Make</label>
            <input type="text" name="invThumbnail" id="invMake" required <?php if (isset($invThumbnail)) {
                                                                            echo "value='$invThumbnail'";
                                                                        } 
                                                                        elseif (isset($invInfo['invThumbnail'])){
                                                                            echo "value = '$invInfo[invThumbnail]'";
                                                                            
                                                                        }
                                                                        
                                                                        ?> br><br><br>




<label for="Price">Price</label>
            <input type="text" name="invPrice" id="invPrice" required <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } 
                                                                        elseif (isset($invInfo['invPrice'])){
                                                                            echo "value = '$invInfo[invPrice]'";
                                                                            
                                                                        }
                                                                        
                                                                        ?> br><br><br>




<label for="Stock">Stock</label>
            <input type="text" name="invStock" id="invStock" required <?php if (isset($invStock)) {
                                                                            echo "value='$invStock'";
                                                                        } 
                                                                        elseif (isset($invInfo['invStock'])){
                                                                            echo "value = '$invInfo[invStock]'";
                                                                            
                                                                        }
                                                                        
                                                                        ?> br><br><br>





<label for="Color">Color</label>
            <input type="text" name="invColor" id="invColor" required <?php if (isset($invColor)) {
                                                                            echo "value='$invColor'";
                                                                        } 
                                                                        elseif (isset($invInfo['invColor'])){
                                                                            echo "value = '$invInfo[invColor]'";
                                                                            
                                                                        }
                                                                        
                                                                        ?> br><br><br>




<input type = "submit" value= "Update Vehicle">
<input type = "hidden" name = "action" value="updateVehicle">
<input type="hidden" name="invId" value="
<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
elseif(isset($invId)){ echo $invId; } ?>
">

                                                                    </form>
<hr>

<footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
