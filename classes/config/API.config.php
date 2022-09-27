<?php

    class API{

        // protected $API_ROOT_PATH = "https://api.insecyber.com";
        protected $API_ROOT_PATH = "http://localhost:8000";

        //params -> associative array to be converted to json body
        //query -> associative array to be converted to url key value pair
        //auth_token -> bearer auth
        public function REQ__post($url, $body, $options = []){

            $get_response_code = $options["get_response_code"] ?? false;

            $content_type = $options["content_type"] ?? "application/json";
            $query = $options["query"] ?? [];
            $auth_token = $options["auth_token"] ?? "";

            $query = http_build_query($query);

            $request = curl_init("$url?$query");

            $headers = ["Content-Type: $content_type"];

            if($auth_token != ""){

                array_push($headers, "Authorization: Bearer ".$auth_token);

            }

            curl_setopt($request, CURLOPT_POST, 1);

            if($content_type == "multipart/form-data"){
                curl_setopt($request, CURLOPT_POSTFIELDS, $body);
            }else{
                curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($body));
            }

            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($request);

            $httpcode = curl_getinfo($request, CURLINFO_HTTP_CODE);

            curl_close($request);

            $response_return = json_decode($response, true);

            return ($get_response_code) ? [$httpcode, $response_return] : $response_return;

        }

        public function REQ__get($url, $options = []){

            $get_response_code = $options["get_response_code"] ?? false;

            $query = $options["query"] ?? [];
            $auth_token = $options["auth_token"] ?? "";

            $query_params = http_build_query($query);

            $url = $url."?".$query_params;


            $request = curl_init($url);

            $headers = [];

            if($auth_token != ""){

                array_push($headers, "Authorization: Bearer ".$auth_token);

            }

            curl_setopt($request, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($request);

            $httpcode = curl_getinfo($request, CURLINFO_HTTP_CODE);

            curl_close($request);

            $response_return = json_decode($response, true);

            return ($get_response_code) ? [$httpcode, $response_return] : $response_return;

        }

        public function REQ__getWithoutParam($url){
            $get_response_code = false;
            $url = $url;

            $request = curl_init($url);

            $headers = [];

            curl_setopt($request, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($request);

            $httpcode = curl_getinfo($request, CURLINFO_HTTP_CODE);

            curl_close($request);

            $response_return = json_decode($response, true);

            return ($get_response_code) ? [$httpcode, $response_return] : $response_return;

        }

        public function REQ__delete($url, $options = []){

            $get_response_code = $options["get_response_code"] ?? false;

            $query = $options["query"] ?? [];
            $auth_token = $options["auth_token"] ?? "";

            $query_params = http_build_query($query);

            $url = $url."?".$query_params;


            $request = curl_init($url);

            $headers = [];

            if($auth_token != ""){

                array_push($headers, "Authorization: Bearer ".$auth_token);

            }

            curl_setopt($request, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($request);

            $httpcode = curl_getinfo($request, CURLINFO_HTTP_CODE);

            curl_close($request);

            $response_return = json_decode($response, true);

            return ($get_response_code) ? [$httpcode, $response_return] : $response_return;

        }

        public function REQ__patch($url, $body, $options = []){

            $get_response_code = $options["get_response_code"] ?? false;

            $content_type = $options["content_type"] ?? "application/json";
            $auth_token = $options["auth_token"] ?? "";

            $request = curl_init($url);

            $headers = ["Content-Type: $content_type"];

            if($auth_token != ""){

                array_push($headers, "Authorization: Bearer ".$auth_token);

            }

            curl_setopt($request, CURLOPT_CUSTOMREQUEST, "PATCH");

            if($content_type == "multipart/form-data"){
                curl_setopt($request, CURLOPT_POSTFIELDS, $body);
            }else{
                curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($body));
            }


            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($request);

            $httpcode = curl_getinfo($request, CURLINFO_HTTP_CODE);

            curl_close($request);

            $response_return = json_decode($response, true);

            return ($get_response_code) ? [$httpcode, $response_return] : $response_return;

        }

    }

?>
