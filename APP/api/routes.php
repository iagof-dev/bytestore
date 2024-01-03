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

    public function MAKE_POST_REQUEST($url, $info_data){
        $url = $this->api_url . $url;
        $data = array(
            "apiuser" => $this->api_user,
            "apipass" => $this->api_pass
        );

        
        if(isset($info_data))
            $data = array_merge($data, $info_data);


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);


        echo($result['status']);

        if (!isset($result['status']) || $result['status'] !== "success") 
            return false;

        return $result;
    }

    public function MAKE_GET_REQUEST($url){
        $ch = curl_init($this->api_url . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        
        return $result;
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
        
        $ipv4 = $this->getPublicIP();
        $date = date("Y-m-d H:i:s");
        
        
        $data = array(
            "id" => $id,
            "access_ip" => $ipv4,
            "last_access" => $date
        );

        $this->MAKE_POST_REQUEST("/usuario/modificar", $data);

        return true;
    }
    
    
    function MAKE_LOGIN_REQUEST($email, $pass)
    {
        $data = array(
            "email" => $email,
            "pass" => md5($pass)
        );
        
        $result = $this->MAKE_POST_REQUEST("/usuario/logar/", $data);
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


        return true;
    }
    
    
    
    function MAKE_REGISTER_REQUEST($name, $email, $pass)
    {
        $ipv4 = $this->getPublicIP();
        $data = array(
            "username" => $name,
            "email" => $email,
            "pass" => md5($pass),
            "role" => "user",
            "register_ip" => $ipv4
        );
        $this->MAKE_POST_REQUEST("/usuario/criar/", $data);
        return true;
    }
    
    function GET_LIST_CATEGORY()
    {
        $result = $this->MAKE_GET_REQUEST('/categoria/listar/'); 

        $array_result = $result["DATA"];
        $result_final = "";
        
        foreach ($array_result as $valor) {
            $result_final .= "<option value=" . $valor['id'] . ">" . $valor['name'] . "</option>";
        }
        return $result_final;
    }
    
    function GET_USER_BY_ID($id)
    {
        return $this->MAKE_GET_REQUEST('/usuario/id/' . $id);
    }
    
    function CREATE_PRODUCT($title, $description, $value, $category, $image, $id)
    {
        $data = array(
            "title" => $title,
            "description" => $description,
            "price" => $value,
            "image" => $image,
            "id_category" => $category,
            "owner" => $id,
            "created" => date("Y-m-d H:i:s")
        );
        
        $result = $this->MAKE_POST_REQUEST("/produto/criar/", $data);
        
        return true;
    }
    
    function GET_CARDS()
    {
        $result = $this->MAKE_GET_REQUEST("/produto/listar");
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
        return $this->MAKE_GET_REQUEST("/produto/owner/" . $id);
    }
    
    
    function CREATE_CARDS_BY_OWNER($id)
    {
        $result = $this->MAKE_GET_REQUEST("/produto/owner/" . $id);
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
        return $this->MAKE_GET_REQUEST("/produto/id/" . $id);
    }
    
    function MAKE_UPDATE_POST_REQUEST($id, $title = null, $desc = null, $value = 0, $img = null)
    {
        $data = array(
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

        $this->MAKE_POST_REQUEST("/produto/modificar/", $data);

        return true;
    }
    
    function DELETE_PRODUCT($id)
    {
        $data = array(
            "id" => $id
        );
        
        $this->MAKE_POST_REQUEST("/produto/deletar/",$data);
        return true;
    }
    
    
    function UPDATE_USER($id,$name = null, $desc = null, $pfp = null)
    {
        $data = array(
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

        $result = $this->MAKE_POST_REQUEST("/usuario/modificar/", $data);
        return true;
    }
    
    
    
    //PARAMETERS:
    //customer_id
    //seller_id
    //seller_product_id
    //customer_email
    //status
    //date
    function CREATE_GATEWAY_PAYMENT($id_product, $id_seller, $id_customer,$email_customer){
        $data = array(
            "customer_id" => $id_customer,
            "seller_id" => $id_seller,
            "seller_product_id" => $id_product,
            "customer_email" => $email_customer,
            "status" => "pending",
            "date" => date('Y-m-d H:i:s')
        );

        $result = $this->MAKE_POST_REQUEST("/pedidos/criar", $data);
        
        return $result['id'];
    }

    function GET_GATEWAY_BY_ID($id){
        $result = $this->MAKE_GET_REQUEST('/pedidos/id/'. $id);

        $array_result = $result["DATA"];
        return $array_result;
    }

    function CREATE_PIX_PAYMENT($id_gateway, $product_title, $customer_email,  $value){
        $data = array(
            "id_gateway" => $id_gateway,
            "product_title" => $product_title,
            "seller_product_id" => $id_product,
            "customer_email" => $email_customer,
            "customer_email" => $customer_email,
            "value" => $value
        );

        $result = $this->MAKE_POST_REQUEST("/pagamentos/criar", $data);
        return $result;
    }
    
    function GET_PURCHASES_BY_CUSTOMERID($id)
    {
        $data = array(
            "cid" => $id
        );

        $result = $this->MAKE_POST_REQUEST("/pedidos/listar", $data);
        return $result;
    }

        
    
}
