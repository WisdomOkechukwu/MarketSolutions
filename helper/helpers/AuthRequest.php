<?php 
session_start();


require_once "../../AuthController/AuthController.php";
require_once "regexhelper.php";



$Authentication = new AuthController();


if($_SERVER['REQUEST_METHOD'] == "POST"):
    //?SignUp
    if(isset($_POST['button_register'])):
        //? validate the inputs
        $name = test_input($_POST['fullname']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']); 
        $password = test_input($_POST['password']);
        $Confirm_password = test_input($_POST['confirm_password']);

        
        //? Pass Old Value incase the input don't meet the verification
        $_SESSION['old_name'] = $name;
        $_SESSION['old_email'] = $email;
        $_SESSION['old_phone'] = $phone;

        //?Setting all email to lower
        $email = strtolower($email);

        //!Regex Testing

        //?For Name
        $nameState = NameRegexBuilder($name);
        ($nameState == "false") ? $_SESSION['nameVerification'] = "false" : $_SESSION['nameVerification'] ="true";

        //?For Email
        $emailState = EmailRegexBuilder($email);
        ($emailState == "false") ? $_SESSION['emailVerification'] = "false" : $_SESSION['emailVerification'] ="true";

        //?Email Duplication  
        $emailDuplicationState = $Authentication->VerifyEmailAddressDuplication($email);
        ($emailDuplicationState == "true") ? $_SESSION['UniqueEmail'] = "false": $_SESSION['UniqueEmail'] = "true";


        //?For Phone 
        $phoneState = PhoneRegexBuiler($phone);
        ($phoneState == "false") ? $_SESSION['phoneVerification'] = "false" : $_SESSION['phoneVerification'] ="true";

        //?Password Validation
        $passwordState = ($password == $Confirm_password)? "true":"false";
        ($passwordState == "false") ? $_SESSION['passwordVerification'] = "false" :"";

        //?To redirect to the registration page to see any problem with inputs
        if($nameState=="false"||$emailState=="false"||$phoneState=="false"||$passwordState=="false"||$emailDuplicationState=="true"){
            header("location:../../index.php");
        }
        
        if($nameState == "true" && $emailState =="true" && $phoneState =="true" && $passwordState =="true"&& $emailDuplicationState == "false")
        {
            $User_Identification_Number = makeRandomString(35);
            $RegistrationState = $Authentication->UserRegistration($name,$email,$phone,$password,$User_Identification_Number);
            //? if Regisration is successfull sign in to the dashboard
            ($RegistrationState == "Success") ? header("location: ../../Routes/Dashboard.php"):"Not Dashboard";
            $_SESSION['name_loggedin'] = $name;
            $_SESSION['email_loggedin'] = $email;
            $_SESSION['Random_loggedin'] = $User_Identification_Number;
        }

    endif;

    //? LogIN
    if(isset($_POST['login_button'])):
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);

        $_SESSION['old_email'] = $email;
        //?Setting all email to lower
        $email = strtolower($email);

        //?Validating Email
        $emailState = EmailRegexBuilder($email);
         
        $VerificationStatus = $Authentication->UserVerification($email,$password);

        if($emailState == "false" )
        {
            $_SESSION['emailVerification'] = "false";
            header("Location:../../login.php");
        }
        if($VerificationStatus =="Error")
        {
            $_SESSION['VerificationStatus']  = "false";
            header("Location:../../login.php");
        }

        if(is_array($VerificationStatus))
        {
            foreach($VerificationStatus as $key => $value) {

                $_SESSION['name_loggedin'] = $value['name'];
                $_SESSION['email_loggedin'] = $value['email'];
                $_SESSION['Random_loggedin'] = $value['random'];

                header("Location:../../Routes/Dashboard.php");

            }
        }



    endif;

    if(isset($_POST['forgot'])):
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $Confirm_password = test_input($_POST['Confirm_password']);

        $_SESSION['old_email'] = $email;
        //?Setting all email to lower
        $email = strtolower($email);

        $emailState = EmailRegexBuilder($email);
        ($emailState == "false") ? $_SESSION['emailVerification'] = "false" : $_SESSION['emailVerification'] ="true";

        $passwordState = ($password == $Confirm_password)?"true":"false";
        ($passwordState == "false") ? $_SESSION['passwordVerification'] = "false" : $_SESSION['passwordVerification'] ="true";

        

        if($emailState == "false"||$passwordState == "false")
        {
            header("Location: ../../forgotpassword.php");
        }
        $VerifyEmail = $Authentication->UserFindEmail($email,$password);
        ($VerifyEmail == "Error") ? $_SESSION['emailErrorVerification'] = "true": $_SESSION['emailErrorVerification'] = "false";

        if($VerifyEmail == "Error")
        {
            header("Location: ../../forgotpassword.php");
        }
        else{
            header("Location: ../../login.php");
        }

    endif;


endif;








?>