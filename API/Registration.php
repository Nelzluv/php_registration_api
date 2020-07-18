<?php
require '../init.php';

//Instantiate Post Object
$user = new User;
//GET RAW DATA
$data = json_decode(file_get_contents("php://input"));

//Validation
notEmpty($data->firstname, 'Please type in firstname');
notEmpty($data->lastname, 'Please type in lastname');
notEmpty($data->username, 'Please type in username');
notEmpty($data->email, 'Please type in email');
notEmpty($data->password, 'Please type in password');

$user->username = $data->username;
$user->firstname= $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$user->password = password_hash($data->password, PASSWORD_BCRYPT);

//CREATE POST
if ($user->register($user)) {
  print_r($user->firstname);
} else {
  echo json_encode(
    array('message' => 'Something went wrong')
  );
}

 ?>
