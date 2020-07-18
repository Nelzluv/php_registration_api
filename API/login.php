<?php
//Header functions
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

require '../init.php';

//Instantiate Post Object
$user = new User;
//GET RAW DATA
$data = json_decode(file_get_contents("php://input"));

//Validation
notEmpty($data->username, 'Please type in username');
notEmpty($data->password, 'Please type in password');

$user->username = $data->username;
$user->password = $data->password;

//CREATE POST
if ($user->login($user)) {
  echo json_encode(
    array('message' => 'User Login')
  );
} else {
  echo json_encode(
    array('message' => 'Invalid user or password')
  );
}

 ?>
