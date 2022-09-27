<?php
require_once "../classes/Countries.class.php";

$countries_obj = new Countries();

$countries_data = $countries_obj->get_client_countries();

if($countries_data["status"] == true){
    echo json_encode([
      'status' => true,
      'message' => $countries_data['message'],
      'data' => $countries_data['data']['client_country_list']
    ]);
}else{
    http_response_code(401);
    die();
}