<?php
ob_start();
session_start();
require_once('./Controller/pages.php');
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug | " . $output . "' );</script>";
}

class mysql{
    public $db_ip = "";
    public $db_port = "3306";
    public $db_user = "";
    public $db_pass = "";
    public $db_database = "nrdydes1_bytestore";
    public static $db_table_users = "users";
    public static $db_table_products = "products";
    public $db;

    public function __construct() {
        $this->db= new mysqli($this->db_ip, $this->db_user, $this->db_pass, $this->db_database, $this->db_port);
    }

    public function getConexao() {
        return $this->db;
    }
}


if($_SESSION['user_logged'] == null or $_SESSION['user_logged'] != "true" or $_SESSION['user_logged'] == ""){
    echo("Usuario não logado. <br>");
    user_login($_POST["txt_email"], $_POST["txt_pass"]);
}

function user_login($input_email, $input_pass)
{

    $conexao = new mysql();
    $mysqli = $conexao->getConexao();

    $verify = "select * from ". $conexao::$db_table_users . " where email='$input_email' and pass='$input_pass';";
    $resultado = mysqli_query($mysqli, $verify);
    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            
            debug_to_console("MySQL | Resgatando informações!");
            $user_id = $linha["id"];
            $user_name = $linha["username"];
            $user_email = $linha["email"];
            $user_role = $linha["role"];


            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_logged'] = "true";

            switch ($user_role) {
                default:
                    echo ("Sem permissão para visualizar página!");
                    exit();
                case 'admin':
                    echo ("<br> ADMIN");
                    header("Location: /admin");
                    exit();

            }
        }
    } else {
        $_SESSION['user_logged'] = "false";
        debug_to_console("MySQL | Informações do usuario está incorreta!");
        echo ("Usuário/Senha incorretas ou Não Existente...");
        header("Location: /login");
        exit();

    }
}


//<div class="prods"><div class="prod"><div class="prod-img"><img width="120px" src="$linha["image"]"></div><div class="prod-info"><div class="prod-title"><h1>$linha["title"]</h1></div><div class="prod-desc"><p>$linha["description"]</p></div></div><div class="prod-value"><div class="prod-price"><h2>R$ $linha["price"]</h2></div><div class="prod-bt-edit"><button href="#" class="btn btn-primary">Editar</button></div></div></div></div>
function user_get_products(){
    $all_anuncios = '';
    $qnt_anuncios = 0;
  
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
  
    $com = "select * from ". $conexao::$db_table_products. " where owner=". $_SESSION['user_id'].";";
    $anuncios = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($anuncios) > 0) {
        debug_to_console("Numero de anuncios: ". mysqli_num_rows($anuncios));
        while ($linha = mysqli_fetch_assoc($anuncios)) {
            if ($qnt_anuncios <= 4){
                $anuncio = '<div class="prods"><div class="prod"><div class="prod-img"><img width="120px" height="68" src="'. $linha["image"]. '"></div><div class="prod-info"><div class="prod-title"><h1>'. $linha["title"]. '</h1></div><div class="prod-desc"><p>'. $linha["description"]. '</p></div></div><div class="prod-value"><div class="prod-price"><h2>R$ '. $linha["price"]. '</h2></div><div class="prod-bt-edit"><a href="/edit?id='. $linha["id"]. '"><button class="btn btn-primary"><i class="fa-solid fa-pen" style="height: 5px;"></i> Editar</button></a></div></div></div></div>';
                $all_anuncios = $all_anuncios. ''. $anuncio;
                debug_to_console($all_anuncios);

            }
            $qnt_anuncios += 1;

  
            
        }

        return $all_anuncios;

    }
    else{
        return '<h1 style="color: red; padding-top: 10px;" class="center">Sem anúncios para mostrar :(</h1>';
        
    }
  
  }

function create_product($titulo, $descricao, $preco, $img, $gateway){
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $user_id = $_SESSION['user_id'];

    $com = "insert into ". $conexao::$db_table_products. " values(default, '$titulo', '$descricao', '$preco', '$img', '$gateway', $user_id);";
    $createproduct = mysqli_query($mysqli, $com);
}


function get_prod_specif($id){

    debug_to_console("id recebido: ". $_GET['id']);

    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $user_id = $_SESSION['user_id'];
    $com = ("select * from ". $conexao::$db_table_products. " where id=$id;");
    $getproduct = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($getproduct) > 0) {
        debug_to_console("Tem linhas");
        while ($linha = mysqli_fetch_assoc($getproduct)) {
            debug_to_console("Pegando infos");
            

            $product_id = $linha["id"];
            $product_title = $linha["title"];
            $product_desc = $linha["description"];
            $product_price = $linha["price"];
            $product_img = $linha["image"];
            $product_gateway = $linha["gateway"];
            $product_owner = $linha["owner"];


            if ($product_owner == $_SESSION['user_id']){
                $product = [$product_id, $product_title, $product_desc, $product_price, $product_img, $product_gateway, $product_owner];
                debug_to_console("Usuario é dono do produto");
                debug_to_console($product[5]);

                return $product;

            }


            header("Location: /admin");


        }
        
    }
    else{
        header("Location: /admin");
    }


}

function delete_product($id){

    $products = get_prod_specif($id);

    if ($products[6] == $_SESSION['user_id'])
    {
        $conexao = new mysql();
        $mysqli = $conexao->getConexao();
        $user_id = $_SESSION['user_id'];
        $com = ("delete from ". $conexao::$db_table_products. " where id=$id;");
        $delete_prod = mysqli_query($mysqli, $com);
    }

    header("Location: /admin");



}



ob_end_flush();




?>