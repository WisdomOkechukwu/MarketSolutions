<?php 

function ArrayOutputter($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}

function Verify_User($result ,$inputtedEmail,$inputtedPassword)
{
    foreach ($result as $key => $value) {
    
        $EmailVerify = ($inputtedEmail == $value['email']) ? "true":"false";
        $passwordVerify = (password_verify($inputtedPassword,$value['password'])) ? "true":"false";
    }
    return ($EmailVerify == "true" && $passwordVerify == "true")? "SignedIN":"Error";


}

?>