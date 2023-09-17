<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class API
{

    private $api_url;

    private $api_user;

    private $api_pass;

    public function __construct()
    {
        require_once("secret-key.php");
        $this->api_url = $api_url;
        $this->api_user = $api_user;
        $this->api_pass = $api_pass;
    }

    function MAKE_LOGIN_REQUEST($email, $pass)
    {
        $pass_md5 = md5($pass);

        $url = $this->api_url . "/usuario/logar/";

        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "email" => $email,
            "pass" => $pass_md5
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);
        if (!isset($result) || $result['status'] != "success")
            return false;


        require_once(__DIR__ . "/../Model/usuario.php");
        $user = new user();
        $user->setId($result['message']['0']['id']);
        $user->setName($result['message']['0']['username']);
        $user->setEmail($result['message']['0']['email']);
        $user->setPFP($result['message']['0']['pfp']);
        $user->setRole($result['message']['0']['role']);
        $user->setDesc($result['message']['0']['description']);
        $_SESSION['user_id'] = $result['message']['0']['id'];


        //echo "Response: " . $response;
        //echo($result['message']['0']['id']);
        //echo($user->getId());
        //echo($user->getName());

        return true;

        //header('Location: /');
    }



    function MAKE_REGISTER_REQUEST($name, $email, $pass)
    {
        $pass_md5 = md5($pass);

        $url = $this->api_url . "/usuario/criar/";

        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "username" => $name,
            "email" => $email,
            "pass" => $pass_md5,
            "role" => "user"
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $result = json_decode($response, true);

        curl_close($ch);

        if (!isset($result) || $result['status'] != "success")
            return false;

        return true;
    }

    function GET_LIST_CATEGORY()
    {
        $ch = curl_init($this->api_url. '/categoria/listar/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($data, true);

        if (!isset($result) || $result['status'] != "success")
            return false;
        //<option value="1">Placa mãe</option>
        $array_result = $result["DATA"];
        $result_final = "";

        foreach($array_result as $valor){
            $result_final .= "<option value=".$valor['id']. ">" .$valor['name']."</option>";
        }


        return $result_final;

        
    }
}
