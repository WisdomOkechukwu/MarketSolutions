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
            $sql = "SELECT * FROM item ORDER BY id DESC";

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
            $sql = "SELECT * FROM item WHERE foriegnid = '$randomString' ORDER BY id DESC";

            $statement = $connection->query($sql);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function UpdatePassword($Email,$password)
    {
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            $connection = DB::DBConnectionInitializer();
            $sql = "UPDATE user SET password='$hashed_password' WHERE email = '$Email'";
            $connection->exec($sql);
            return "Updated";
    }


    public function getUserByRandomID($randomString)
    {
        try{
        $connection = DB::DBConnectionInitializer();
        $sql = "SELECT name FROM user WHERE random = '$randomString'";
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