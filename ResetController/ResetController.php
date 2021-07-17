<?php 


require_once '../../DB/DB.php';
require_once '../../helper/ControllerHelper/output.php';


class UserController{

    public function __construct()
    {
        
    }

    public function UpdatePassword($Email,$password)
    {
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            $connection = DB::DBConnectionInitializer();
            $sql = "UPDATE user SET password='$hashed_password' WHERE email = '$Email'";
            $connection->exec($sql);
            return "Updated";
    }
}


?>