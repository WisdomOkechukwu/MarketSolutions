<?php 
include_once "../../DB/DB.php";
include_once "../../helper/ControllerHelper/output.php";

class AuthController{

    public function __construct()
    {
        
    }

    public function UserRegistration($Name,$Email,$Phone,$password,$random)
    {
        try{
            $connection = DB::DBConnectionInitializer();
            $statement = $connection->prepare("INSERT INTO user (name, phone, email, password, random)
                                                VALUES (:name, :phone, :email, :password, :random)");

            $statement->bindParam(':name',$Namevar);
            $statement->bindParam(':phone',$Phonevar);
            $statement->bindParam(':email',$Emailvar);
            $statement->bindParam(':password',$passwordvar);
            $statement->bindParam(':random',$randomvar);


            $Namevar = $Name;
            $Phonevar = $Phone;
            $Emailvar = $Email;
            $passwordvar = password_hash($password,PASSWORD_DEFAULT);
            $randomvar = $random;


            $statement->execute();
            $connection = null;
            return "Success";

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function VerifyEmailAddressDuplication($Email)
    {
        try{
            $connection = DB::DBConnectionInitializer();
            
            $sql = "SELECT email FROM user WHERE email ='$Email'";
            
            //? Execute Query
            $statement = $connection->query($sql);
            $statement->execute();

            //? setting the output as an associative array
            $result = $statement->fetchAll();

            return (count($result) >= 1)? "true":"false";

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function UserVerification($Email,$password)
    {
        try{
            $connection = DB::DBConnectionInitializer();
            
            $sql = "SELECT * FROM user WHERE email ='$Email'";
            
            //? Execute Query
            $statement = $connection->query($sql);
            $statement->execute();

            //? setting the output as an associative array
            $result = $statement->fetchAll();

            $Verification_state = (count($result)>=1) ? Verify_User($result,$Email,$password):"Error";

            return $Verification_state;


            

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function UserFindEmail($Email,$newpassword)
    {
        try{
            $connection = DB::DBConnectionInitializer();
            
            $sql = "SELECT email FROM user WHERE email ='$Email'";
            
            //? Execute Query
            $statement = $connection->query($sql);
            $statement->execute();

            //? setting the output as an associative array
            $result = $statement->fetchAll();

            $ResetState =  (count($result) >= 1)? $this->UpdatePassword($Email,$newpassword):"Error";
            return $ResetState;
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


}



?>