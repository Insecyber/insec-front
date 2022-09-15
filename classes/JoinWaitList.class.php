<?php

    require_once dirname(__FILE__)."/config/API.config.php";

    class JoinWaitList extends API{

        public function __construct(){
            $this->API_PATH = $this->API_ROOT_PATH."/waiting-list";
        }

        public function joinWaitList($name, $email, $type, $country, $company){

            if ($company == '') {
                $data = [
                    "name" => $name,
                    "email" => $email,
                    "type" => $type,
                    "country" => $country
                ];
            }else {
                $data = [
                    "name" => $name,
                    "email" => $email,
                    "type" => $type,
                    "country" => $country,
                    "company" => $company
                ];
            }
            
            $options = [
                "content_type" => "multipart/form-data"
            ];

            return $this->REQ__post($this->API_PATH."/join", $data, $options);

        }
    }
?>