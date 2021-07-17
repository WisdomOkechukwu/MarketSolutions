<?php 

function ArrayOutputter($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function Verify_User($result ,$inputtedEmail,$inputtedPassword)
{
    foreach ($result as $key => $value) {
    
        $EmailVerify = ($inputtedEmail == $value['email']) ? "true":"false";
        $passwordVerify = (password_verify($inputtedPassword,$value['password'])) ? "true":"false";
    }
    return ($EmailVerify == "true" && $passwordVerify == "true")? $result:"Error";
}

function makeRandomString($valueLenght)
        {
            $aph = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
            $FinalString = "";
            for ($i=0; $i <= $valueLenght ; $i++) { 
                $FinalString .= $aph[mt_rand(0,strlen($aph) -1)];
            
            }
            return $FinalString;
        }

?>