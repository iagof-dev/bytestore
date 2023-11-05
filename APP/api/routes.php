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


    function getPublicIP()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://httpbin.org/ip");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $ip = json_decode($output, true);
        return $ip['origin'];
    }


    function REGISTER_IP($id)
    {

        $url = $this->api_url . "/usuario/modificar";
        $ipv4 = $this->getPublicIP();
        $date = date("Y-m-d H:i:s");


        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "id" => $id,
            "access_ip" => $ipv4,
            "last_access" => $date
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


        $this->REGISTER_IP($result['message']['0']['id']);
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
        $ipv4 = $this->getPublicIP();

        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "username" => $name,
            "email" => $email,
            "pass" => $pass_md5,
            "role" => "user",
            "register_ip" => $ipv4
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

    function GET_USER_BY_ID($id)
    {
        $ch = curl_init($this->api_url . '/usuario/id/' . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($data, true);

        if (!isset($result) || $result['status'] != "success")
            return false;

        return $result;
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


    function CREATE_CARDS_BY_OWNER($id)
    {
        $url = $this->api_url . "/produto/owner/" . $id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($data, true);


        $array_result = $result["DATA"];
        if(empty($array_result)){
            return "<h1 class='text-red-600'>Nenhum produto encontrado</h1>";
        }

        require_once(__DIR__ . "/../etc/cards.php");
        $CARD = new CARD();
        $result_final = "";
        foreach ($array_result as $valor) {
            $result_final .= $CARD->CREATE_CARD($valor['id'], $valor['title'], $valor['price'], $valor['discount'], $valor['image'], $valor['owner']);
        }


        return $result_final;
    }

    function GET_PRODUCT_BY_ID($id)
    {
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

        if (isset($img)){
            $data['image'] = $img;
        }

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

    function DELETE_PRODUCT($id)
    {
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
    

    function UPDATE_USER($id,$name = null, $desc = null, $pfp = null)
    {
        $url = $this->api_url . "/usuario/modificar/";
        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "id" => $id
        );


        if(isset($name) && !empty($name)){
            $data['username'] = $name;
            (new user())->setName($name);
        }
        if(isset($desc) && $desc != null){
            $data['description'] = $desc;
            (new user())->setDesc($desc);
        }
        if(isset($pfp) && $pfp != 0 && $pfp != null){
            $data['pfp'] = $pfp;
            (new user())->setPFP($pfp);
        }
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $result = json_decode($response, true);

        curl_close($ch);

        if (!isset($result) || $result['status'] != "success")
            return $result;

        return true;
    }

    function CREATE_PAYMENT_LINK($id, $title, $desc, $unit_price, $id_seller, $customer_id, $customer_email, $category,$qnt = 1){
        $url = $this->api_url . "/pagamentos/criar/";
        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass,
            "product_id" => $id,
            "title" => $title,
            "description" => $desc,
            "unit_price" => $unit_price,
            "quantity" => $qnt,
            "seller_id" => $id_seller,
            "customer_id" => $customer_id,
            "customer_email" => $customer_email,
            "category_id"=> $category
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);


        if (!isset($result) || $result['status'] != "success")
            return $response;

        return $result['data']['url_sandbox'];

    }



}
