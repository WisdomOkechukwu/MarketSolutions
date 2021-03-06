<?php 
require_once '../../DB/DB.php';
require '../../helper/ControllerHelper/output.php';

class ItemController{
    public function __construct()
    {
        
    }

    public function CreateItem($randomString,$ItemName,$description,$price,$created_at,$itemRandomString)
    {
        try{
            $connection = DB::DBConnectionInitializer();
            
            $statement = $connection->prepare("INSERT INTO item (foriegnid, name, description, price, random, created_at)
                                                 VALUES (:random, :itemname, :description, :price, :randoms, :created_ats)");

            $statement->bindParam(':random',$Random_variable);
            $statement->bindParam(':itemname', $name_variable);
            $statement->bindParam(':description', $description_variable);
            $statement->bindParam(':price', $price_variable);
            $statement->bindParam(':created_ats', $created_at_variable);
            $statement->bindParam(':randoms', $itemRandom_variable);


            $Random_variable = $randomString;
            $name_variable = $ItemName;
            $description_variable = $description;
            $price_variable = $price;
            $created_at_variable = $created_at;
            $itemRandom_variable = $itemRandomString;

            $statement -> execute();
            $connection = null;

            return "Success";

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getItemByRandomString($RandomString)
    {
        try{
            $connection = DB::DBConnectionInitializer();

            $sql = "SELECT * FROM item WHERE random='$RandomString'";

            $statement = $connection->query($sql);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function UpdateItem($name,$description,$price,$RandomString)
    {
        try{
            $connection = DB::DBConnectionInitializer();
            $sql = "UPDATE item SET name='$name',description='$description',price='$price'
             WHERE random = '$RandomString'";
            $connection->exec($sql);
            return "Updated";

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function DeleteItem($RandomString)
    {
        try{
            $connection = DB::DBConnectionInitializer();

            $sql = "DELETE FROM item WHERE random='$RandomString'";
            $connection->exec($sql);
            return "Deleted";
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


?>