<?php 

function NameRegexBuilder($name)
{

    $regex_name_validation = "/^[a-zA-Z\s]+$/";

    return (preg_match($regex_name_validation,$name)) ? "true":"false";
}

function EmailRegexBuilder($email)
{
    
    $regex_email_validation = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\.]{2,}+$/";

    return (preg_match($regex_email_validation,$email)) ? "true" : "false";
}

function PhoneRegexBuiler($phone)
{
    
    $regex_phone_validation = "/^[\d]+$/";
    return (preg_match($regex_phone_validation,$phone)) ? "true" : "false";
}
function PriceNameRegexBuilder($name)
{

    $regex_name_validation = "/^[a-zA-Z0-9\s]+$/";

    return (preg_match($regex_name_validation,$name)) ? "true":"false";
}

function PriceRegexBuiler($price)
{
    $regex_price_validation = "/^[\d]+\.[\d]+$/";
    return (preg_match($regex_price_validation,$price)) ? "true" : "false";
}
?>