<?php

    require_once dirname(__FILE__)."/config/API.config.php";

    class Countries extends API{

        public function __construct(){
            $this->API_PATH = $this->API_ROOT_PATH."/country";
        }

        public function get_countries(){
            return $this->REQ__getWithoutParam($this->API_PATH."/all");
        }

        public function get_client_countries(){
            return $this->REQ__getWithoutParam($this->API_PATH."/client");
        }
    }
?>