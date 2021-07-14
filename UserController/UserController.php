<?php 
require_once '../DB/DB.php';
require '../helper/ControllerHelper/output.php';

class UserController{

    public function __construct()
    {
        
    }

    public function showItemOnDashboard()
    {
        try{
            $connection = DB::DBConnectionInitializer();
            $sql = "SELECT * FROM task ORDER BY id DESC";

            $statement = $connection->query($sql);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function showPersonalItems($randomString)
    {
        try{
            $connection = DB::DBConnectionInitializer();
            $sql = "SELECT * FROM task WHERE random = '$randomString'";

            $statement = $connection->query($sql);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }


}



?>