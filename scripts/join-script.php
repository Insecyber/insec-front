<?php
$name = $_POST["name"];
$email = $_POST["email"];
$type = $_POST["type"];
$country = $_POST['country'];
$company = '';

if (isset($_POST['company'])) {
    $company = $_POST['company'];
}

require_once "../classes/JoinWaitList.class.php";

$joinwaitlist_obj = new JoinWaitList();

$join = $joinwaitlist_obj->joinWaitList($name, $email, $type, $country, $company);

if($join["status"] == false){
    echo json_encode([
      'status' => false,
      'message' => $join['message']
    ]);
}elseif($join["status"] == true){
    echo json_encode([
      'status' => true,
      'message' => $join['message']
    ]);
}else{
    http_response_code(401);
    die();
}
