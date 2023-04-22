<?php
ob_start();
session_start();
error_reporting(0);

static $mercado_pago_key = "";

class mysql
{
    //
    //  Database RH
    //

    // public $db_ip = "db.n3rdydzn.software";
    // public $db_port = "3306";
    // public $db_user = "";
    // public $db_pass = "";
    // public $db_database = "nrdydes1_bytestore";
    
    //================================
    //  DigitalOcean Database
    //================================
    public $db_ip = "db3.n3rdydzn.software";
    public $db_port = "25060";
    public $db_user = "n3rdy";
    public $db_pass = "AVNS_FV-KVZgAa3by-CYbAP6";
    public $db_database = "n3rdy_bytestore";

    public static $db_table_users = "users";
    public static $db_table_products = "products";
    public static $db_table_payments = "payments";
    public static $db_table_category = "category";
    public static $db_table_sub_category = "sub_category";
    public $db;

    public function __construct()
    {
        if (!isset($this->db_ip) or empty($this->db_ip) or empty($this->db_user) or empty($this->db_port) or empty($this->db_pass) or empty($this->db_database)) {
            ob_end_clean();
            echo ('<div class="error-container"><div class="textos"> <div class="error-title"> <div class="spinner-border" role="status" style="margin-right: 15px;"></div> <h1 style="vertical-align: middle !important;font-size: 3vh !important;font-family: Arial, Helvetica, sans-serif !important;"> | Ocorreu um Erro!</h1> <h2 style="margin-left: 10px; color: grey;">(Error 500)</h2> </div> <br> <div class="error"> <p>Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato conosco para que possamos ajudá-lo a resolver o problema.</p> </div></div> </div>');
            exit();
        } else {
                $this->db = new mysqli($this->db_ip, $this->db_user, $this->db_pass, $this->db_database, $this->db_port);
                if ($this->db->connect_error) {
                    ob_end_clean();
                    if(str_contains($this->db->connect_error, "Access denied for user")){
                        echo ('<div class="error-container"><div class="textos"> <div class="error-title"> <div class="spinner-border" role="status" style="margin-right: 15px;"></div> <h1 style="font-family: Arial, Helvetica, sans-serif !important;"> | Ocorreu um Erro!</h1> <h2 style="margin-left: 10px; color: grey;">(Error 511)</h2> </div> <br> <div class="error"> <p>Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato conosco para que possamos ajudá-lo a resolver o problema.</p> </div></div> </div>');
                    }
                    else{
                        echo ('<div class="error-container"><div class="textos"> <div class="error-title"> <div class="spinner-border" role="status" style="margin-right: 15px;"></div> <h1 style="font-family: Arial, Helvetica, sans-serif !important;"> | Ocorreu um Erro!</h1> <h2 style="margin-left: 10px; color: grey;">(Error 599)</h2> </div> <br> <div class="error"> <p>Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato conosco para que possamos ajudá-lo a resolver o problema.</p> </div></div> </div>');
                    }
                    exit();
                    
                }
                
        }


    }

    public function getConexao()
    {
        return $this->db;
    }
}


function get_5_random_products()
{
    $retornar = null;
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $com = ("select * from " . $conexao::$db_table_products . " ORDER BY RAND() LIMIT 5;");
    $getrandom5products = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($getrandom5products) > 0) {
        while ($linha = mysqli_fetch_assoc($getrandom5products)) {
            $title_short = mb_strimwidth($linha["title"], 0, 23, "...");
            $retornar = $retornar . '<div class="col"> <a href="/product?id=' . $linha["id"] . '" style="text-decoration: none;"> <div data-aos-once="true" data-aos="zoom-in" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="card" style="width: 17rem;height: 18rem;"> <img   src="./Assets/imgs/products/' . $linha["image"] . '"   class="card-img-top cardimg img-fluid"> <div class="card-body">   <h5 class="card-title text-start card-titulo">' . $title_short . '</h5>   <h6 class="text-start card-preco">R$' . $linha["price"] . '</h6> </div> </div> </a> </div>';
        }
    }
    return $retornar;
}

function enviar_comando($com)
{
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    try {
        $enviar = mysqli_query($mysqli, $com);
    } catch (Exception $e) {
        echo ("Erro!<br> " . $e->getMessage());
        exit();
    }
    if (mysqli_affected_rows($mysqli) > 0) {
        return true;
    } else {
        return false;
    }
}

function create_user($user, $email, $pass, $type){
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $com = "insert into " . $conexao::$db_table_users . " values (default, '" . $user . "', '" . $email . "', '" . $pass . "', '" . $type . "', null, null, null);";
    $resultado = mysqli_query($mysqli, $com);

    return $resultado;
}

?>