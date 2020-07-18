<?php
require '../init.php';

//Instantiate Post Object
$user = new User;
//GET RAW DATA
$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;

$user->username = $data->username;
$user->firstname= $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$user->password = $data->password;


//CREATE POST
if ($user->update($user->id, $user)) {
  echo json_encode(
    array('message' => 'User data updated')
  );
} else {
  echo json_encode(
    array('message' => 'Something went wrong')
  );
}

?>
