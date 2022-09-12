<?php
$name = $_POST["name"];
$email = $_POST["email"];
$type = $_POST["type"];

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://api.insecyber.com/waiting-list/join',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS =>'{
//     "name": '.$name.',
//     "email": '.$email.',
//     "type": '.$type.'
// }',
//   CURLOPT_HTTPHEADER => array(
//     'Content-Type: application/json'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);


// $url = "https://api.insecyber.com/waiting-list/join";
// $fields = [
//     'name'=> $name,
//     'email' => $email,
//     'type' => $type
// ];
// $fields_string = http_build_query($fields);
// //open connection
// $ch = curl_init();

// //set the url, number of POST vars, POST data
// curl_setopt($ch,CURLOPT_URL, $url);
// curl_setopt($ch,CURLOPT_POST, true);
// curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//   'Content-Type: application/json',
//     "Cache-Control: no-cache",
// ));

// //So that curl_exec returns the contents of the cURL; rather than echoing it
// curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

// //execute post
// $response = curl_exec($ch);


// if(!empty($email)){

  require_once "classes/JoinWaitList.class.php";

  $joinwaitlist_obj = new JoinWaitList();

  $join = $joinwaitlist_obj->joinWaitList($name, $email, $type);

  if($join["status"] == false){
      // echo $join['message'];
      echo json_encode([
        'status' => false,
        'message' => $join['message']
      ]);
  }

  if($join["status"] == true){

    echo json_encode([
      'status' => true,
      'message' => $join['message']
    ]);

  }else{

      // $avatars_obj->delete_avatar($avatar_id, $__auth_token);
      http_response_code(401);die();

  }
// }else{
//   echo "Fill in all fields";
// }


// echo json_encode([
//   'data' => $response
// ]);
