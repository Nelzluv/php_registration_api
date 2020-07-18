<?php
//Function to check if an input is empty
function notEmpty($parameter, $error = null){
    if(empty($parameter)){
        echo $error."<br>";
        exit();
    } else {
        return true;
    }
}

//Check if password match
function match($password, $password_again){
    if ($password === $password_again) {
        return true;
    } else {
        echo "Password does not match";
        exit();
    }
}

?>