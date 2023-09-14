<?php
ob_start();
session_start();

class API
{

    private $api_url;

    private $api_user;

    private $api_pass;

    public function __construct()
    {
        require_once("../api/secret-key.php");
        $this->api_url = $api_url;
        $this->api_user = $api_user;
        $this->api_pass = $api_pass;
    }

    function login($email, $pass)
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

        if (!isset($result) || $result['status'] != "success") {
            header("Location: /login?error=1");
        } else {
            require_once("../Model/usuario.php");
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

            header('Location: /');

        }


        // Close cURL session
        curl_close($ch);
    }
}
