<?php 
session_start();

require_once "../../ItemController/ItemController.php";
require_once "../helpers/regexhelper.php";

$item = new ItemController();

if($_SERVER['REQUEST_METHOD'] == 'POST'):
    if(isset($_POST['submit_product'])):
        $itemName = test_input($_POST['name']);
        $itemDescription = test_input($_POST['description']);
        $itemPrice = test_input($_POST['price']);
        $UserRandomString = test_input($_POST['User_RandomString']);


        //?Old Varaibles
        $_SESSION['old_itemName'] = $itemName;
        $_SESSION['old_itemDescription'] = $itemDescription;
        $_SESSION['old_itemPrice'] = $itemPrice;

        //?RegexBuilder
        $priceState = PriceRegexBuiler($itemPrice);
        ($priceState == "false")?$_SESSION['priceVerification'] = "false":$_SESSION['priceVerification'] = "true";

        $nameState = PriceNameRegexBuilder($itemName);
        ($nameState == "false")?$_SESSION['nameVerification'] = "false":$_SESSION['nameVerification'] = "true";

        $DescriptionState = NameRegexBuilder($itemDescription);
        ($DescriptionState == "false")?$_SESSION['descriptionVerification'] = "false":$_SESSION['descriptionVerification'] = "true";

        if($priceState == "false" || $nameState == "false" || $DescriptionState == "false")
        {
            header("Refresh:0; url=../../Routes/Personalitems.php");
        }

        if($priceState == "true" && $nameState == "true" && $DescriptionState == "true")
        {
            $Day = date('d');
            $month = date('F');
            $year = date('Y');


            $date_added = "$month $Day, $year";
            $RandomString = makeRandomString(35);
            $addingItemState = $item->CreateItem($UserRandomString,$itemName,$itemDescription,$itemPrice,$date_added,$RandomString);
            if($addingItemState == "Success")
            {
                $_SESSION['old_itemName'] = "";
                $_SESSION['old_itemDescription'] = "";
                $_SESSION['old_itemPrice'] = "";
                $_SESSION['AddedItem'] = 'true';
                header("Refresh:0; url=../../Routes/PersonalItem.php");
            }
        }
        

    endif;

    if(isset($_POST['update_task'])):
        $name = test_input($_POST['name']);
        $description = test_input($_POST['message']);
        $price = test_input($_POST['price']);
        $randomString = test_input($_POST['Random']);

        


        $_SESSION['getNameValue'] = "";
        $_SESSION['getDescriptionValue'] = "";
        $_SESSION['getRandomValue'] = "";
        $_SESSION['getRandomString'] = "";


        $_SESSION['old_itemName'] = $name;
        $_SESSION['old_itemDescription'] = $description;
        $_SESSION['old_itemPrice'] = $price;

        //?RegexBuilder
        $priceState = PriceRegexBuiler($price);
        ($priceState == "false")?$_SESSION['priceVerification'] = "false":$_SESSION['priceVerification'] = "true";

        $nameState = PriceNameRegexBuilder($name);
        ($nameState == "false")?$_SESSION['nameVerification'] = "false":$_SESSION['nameVerification'] = "true";

        $DescriptionState = NameRegexBuilder($description);
        ($DescriptionState == "false")?$_SESSION['descriptionVerification'] = "false":$_SESSION['descriptionVerification'] = "true";

        
        if($priceState == "false" || $nameState == "false" || $DescriptionState == "false")
        {
            header("Refresh:0; url=../../Routes/UpdateItem.php");
        }
        
        
        if ($priceState == "true" && $nameState == "true" && $DescriptionState == "true") 
        {
            $newName = $name;
            $itemUpdateStatus = $item->UpdateItem($newName,$description,$price,$randomString);
            if($itemUpdateStatus == "Updated")
            {
                
                $_SESSION['UpdatedStatus'] = "true";
                header("Refresh:0; url=../../Routes/UpdateItem.php");
            }
        }



    endif;
endif;

if($_SERVER['REQUEST_METHOD'] == 'GET'):
    if(isset($_GET['edit'])):
        $userData = $item->getItemByRandomString($_GET['edit']);
        
        // ArrayOutputter($userData);
        foreach ($userData as $key => $value) {
            $_SESSION['getNameValue'] = $value['name'];
            $_SESSION['getDescriptionValue'] = $value['description'];
            $_SESSION['getRandomValue'] = $value['price'];
            $_SESSION['getRandomString'] = $_GET['edit'];
            header("Refresh:0; url=../../Routes/UpdateItem.php");
         }
    endif;

    if(isset($_GET['delete'])):
            $item->DeleteItem($_GET['delete']);
        $_SESSION['DeletedTasked'] = "true";
        header("Refresh:0; url=../../Routes/ItemPost.php");

    endif;

endif;

?>