<?php
class Request
{

    public function MakePostRequest($type, $fields)
    {
        require_once("../Controller/key.php");
        $url_final = '';

        switch ($type) {
            case "login":
                $url_final = $route_UserLogin;
                break;
            case "register":
                $url_final = $route_UserRegister;
                break;
        }

        $api_login = [
            'apiuser' => $api_user,
            'apipass' => $api_pass,
        ];
        $array_args = array_merge($fields, $api_login);
        $fields_string = http_build_query($array_args);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_final);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $value = json_decode($result, false);
        return $value;
    }


    public function MakeGetRequest($type, $fields)
    {
        require_once("../Controller/key.php");
        $url_final = '';

        switch ($type) {
            case "login":
                $url_final = $route_UserLogin;
                break;
            case "register":
                $url_final = $route_UserRegister;
                break;
        }

        $api_login = [
            'apiuser' => $api_user,
            'apipass' => $api_pass,
        ];
        $array_args = array_merge($fields, $api_login);
        $fields_string = http_build_query($array_args);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_final);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $value = json_decode($result, false);
        return $value;
    }
}
