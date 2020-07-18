<?php
require '../init.php';

$user = new User;
//GET RAW DATA
$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;

//CREATE POST
if ($user->delete($user->id)) {
  echo json_encode(
    array('message' => 'User deleted')
  );
} else {
  echo json_encode(
    array('message' => 'Something went wrong')
  );
}

?>
