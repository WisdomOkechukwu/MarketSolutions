<?php 
class DB{
    
    //?LocalHost Configuration
    static $DBhost= "localhost";
    static $DBusername = "root";
    static $DBpass = "";
    static $DBname = "market";

    static function DBConnectionInitializer()
    {
        //? Using PDO for database connection to allow various data connection

        $dbhost = self::$DBhost;
        $dbname = self::$DBname;
        $dbuser = self::$DBusername;
        $dbpass = self::$DBpass;

        $connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser,$dbpass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }


    static function DBErrorCatcher()
    {
        //? Using the try and catch to find errors
        try{
            self::DBConnectionInitializer();
            return "Connection Successfully";
        }
        catch (PDOException $e) {
            return "Connection Failed". $e->getMessage();
        }
    }
}


?>