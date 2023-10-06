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
        $ch = curl_init($this->api_url . '/categoria/listar/');
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

        foreach ($array_result as $valor) {
            $result_final .= "<option value=" . $valor['id'] . ">" . $valor['name'] . "</option>";
        }


        return $result_final;
    }


    function CREATE_PRODUCT($title, $description, $value, $category, $image, $id)
    {
        $url = $this->api_url . "/produto/criar/";
        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "title" => $title,
            "description" => $description,
            "price" => $value,
            "image" => $image,
            "id_category" => $category,
            "owner" => $id,
            "created" => date("Y-m-d H:i:s")
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

    function GET_CARDS()
    {
        $url = $this->api_url . "/produto/listar";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($data, true);

        $array_result = $result["DATA"];
        require_once(__DIR__ . "/../etc/cards.php");
        $CARD = new CARD();
        $result_final = "";

        foreach ($array_result as $valor) {
            $result_final .= $CARD->CREATE_CARD($valor['id'], $valor['title'], $valor['price'], $valor['discount'], $valor['image'], $valor['owner']);
        }


        return $result_final;
    }

    function GET_PRODUCTS_BY_OWNER($id)
    {
        $url = $this->api_url . "/produto/owner/" . $id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }

    function GET_SPECIFIC_PRODUCT($id){
        $url = $this->api_url . "/produto/id/" . $id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }

    function MAKE_UPDATE_POST_REQUEST($id, $title = null, $desc = null, $value = 0, $img = null)
    {
        $url = $this->api_url . "/produto/modificar/";
        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "id" => $id
        );
        


        if (isset($title) && $title != " " && $title != "")
            $data["title"] = $title;

        if (isset($desc) && $desc != " " && $desc != "")
            $data["description"] = $desc;


        if ($value != 0) {
            $data["price"] = $value;
        }

        if (isset($img))
            $data['image'] = $img;


        //echo(var_dump($data));


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

    function DELETE_PRODUCT($id){
        //http://api.iagofragnan.com.br/BTS/produto/deletar
        $url = $this->api_url . "/produto/deletar/";
        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "id" => $id
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
}
