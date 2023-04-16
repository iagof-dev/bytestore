<?php
ob_start();
session_start();
error_reporting(0);

require('./DAO/database.php');
require_once('./Controller/pages.php');

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug | " . $output . "' );</script>";
}


if($_SESSION['user_logged'] == null or $_SESSION['user_logged'] != "true" or $_SESSION['user_logged'] == ""){
    debug_to_console("Requisitado");
    user_login($_POST["txt_email"], $_POST["txt_pass"]);
}

function user_login($input_email, $input_pass)
{
    debug_to_console("Requisitado");
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    
    //anti sql injection
    $input_email = mysqli_real_escape_string($mysqli, $input_email);
    $input_pass = mysqli_real_escape_string($mysqli, $input_pass);

    //encriptação MD5
    $input_pass = md5($input_pass);


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
                    header("Location: /purchases");
                    break;
                    
                case 'admin':
                    header("Location: /admin");

                case 'seller':
                    header("Location: /admin");
                    break;

            }
        }
    } else {
        $_SESSION['user_logged'] = "false";
        debug_to_console("MySQL | Informações do usuario está incorreta!");
        echo ("Usuário/Senha incorretas ou Não Existente...");
        header("Location: /login?error=true");
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
                $txt= mb_strimwidth($linha["description"], 0, 127, "...");
                //$anuncio = '<div clrnass="prods"><div class="prod"><div class="prod-img"><img width="120px" height="68" src="./Assets/imgs/products/'. $linha["image"]. '"></div><div class="prod-info"><div class="prod-title"><h1><a href="/product?id='. $linha["id"] .'">'. $linha["title"]. '</a></h1></div><div class="prod-desc"><p>'. $txt. '</p></div></div><div class="prod-value"><div class="prod-price"><h2>R$ '. $linha["price"]. '</h2></div><div class="prod-bt-edit"><a href="/edit?id='. $linha["id"]. '&file='. $linha["image"] .'"><button class="btn btn-primary"><i class="fa-solid fa-pen" style="height: 5px;"></i> Editar</button></a></div></div></div></div>';
                //$anuncio = '<div class="prods"><div class="prod"><div class="prod-img"><img width="120px" height="68" src="./Assets/imgs/products/'. $linha["image"]. '"></div><div class="prod-info"><div class="prod-title"><h1>'. $linha["title"]. '</h1></div><div class="prod-desc"><p>'. $txt. '</p></div></div><div class="prod-value"><div class="prod-price"><h2>R$ '. $linha["price"]. '</h2></div><div class="prod-bt-edit"> <div class="dropdown">   <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">     <i class="fa-solid fa-pen" style="height: 5px;"></i> Modificar   </button>   <ul class="dropdown-menu"> 	<li><a class="dropdown-item" href="/product?id='. $linha["id"]. '"><i class="fa-solid fa-eye"></i> Ver anúncio</a></li>     <li><a class="dropdown-item" href="/edit?id='. $linha["id"]. '&file='. $linha["image"] .'"><i class="fa-solid fa-pen-to-square"></i> Editar</a></li>     <li><a class="dropdown-item" href="/delete?id='. $linha["id"]. '&file=' . $linha['image'] . '"><i class="fa-solid fa-trash-can"></i> Deletar</a></li>   </ul> </div>  </div></div></div></div>';
                $anuncio = '<div class="row" class="position-relative" style="padding-top: 1% !important;">             <div class="col">               <img width="100px" height="100px"                 src="./Assets/imgs/products/'. $linha["image"]. '">             </div>             <div class="col-5 text-start">               <h1 style="margin-bottom: -10px !important;">'. $linha["title"]. '</h1>               <p>'. $txt. '</p>             </div>              <div class="col">               <div style="margin-top: -10%;" class="text-center position-relative top-50 start-50 translate-middle">                 <h2>R$ '. $linha["price"]. '</h2>               </div>             </div>              <div class="col">               <div style="margin-top: 20%;" class="infos position-relative text-center">                   <div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button"                       data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-pen"                         style="height: 5px;"></i> Modificar </button>                     <ul class="dropdown-menu">                       <li><a class="dropdown-item" href="/product?id='. $linha["id"]. '"><i class="fa-solid fa-eye"></i> Ver anúncio</a>                       </li>                       <li><a class="dropdown-item" href="/edit?id='. $linha["id"]. '&file='. $linha["image"] .'"><i class=" fa-solid fa-pen-to-square"></i> Editar</a>                       </li>                       <li><a class="dropdown-item" href="/delete?id='. $linha["id"]. '&file=' . $linha['image'] . '"><i class="fa-solid fa-trash-can"></i> Deletar</a>                       </li>                     </ul>                 </div>               </div>             </div>           </div> ';
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

function create_product($titulo, $descricao, $preco, $img, $id_cat){
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $user_id = $_SESSION['user_id'];

    $com = "insert into ". $conexao::$db_table_products. " values(default, true, '$titulo', '$descricao', '$preco', '$img', $id_cat, $user_id);";
    $createproduct = mysqli_query($mysqli, $com);
}


function get_prod_specif($id){

    debug_to_console("id recebido: ". $id);

    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $user_id = $_SESSION['user_id'];
    $com = ("select * from ". $conexao::$db_table_products. " where id=$id;");
    $getproduct = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($getproduct) > 0) {
        debug_to_console("Tem linhas");
        while ($linha = mysqli_fetch_assoc($getproduct)) {
            debug_to_console("Pegando infos");
            

            $product_id = $linha["id"]; //0
            $product_title = $linha["title"]; //1
            $product_desc = $linha["description"]; //2
            $product_price = $linha["price"]; //3
            $product_img = $linha["image"]; //4
            $product_gateway = $linha["id"]; //5
            $product_owner = $linha["owner"]; //6


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


function get_product_page($id){

    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $com = ("select * from ". $conexao::$db_table_products. " where id=$id;");
    $getproduct = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($getproduct) > 0) {
        while ($linha = mysqli_fetch_assoc($getproduct)) {
            $owner_verified = false;
            $owner_username = "";
            $conexao2 = new mysql();
            $mysqli2 = $conexao2->getConexao();
            $com2 = ("select * from ". $conexao::$db_table_users. " where id=". $linha["owner"] .";");
            $getownerinfoprod = mysqli_query($mysqli2, $com2);
            while ($linha2 = mysqli_fetch_assoc($getownerinfoprod)) {
                $owner_username = $linha2["username"];
                $owner_verified = $linha2["verified"];
            }
            $anuncio_info = array(
                $linha["id"], //0
                $linha["title"], //1
                $linha["description"], //2
                $linha["price"], //3
                $linha["image"], //4
                $linha["id"], //5
                $linha["owner"], //6
                $owner_username, //7
                $owner_verified //8
            );

            return $anuncio_info;
        }
    }
    else{
        header("Location: /error");
    }
}


function delete_product($id, $path){

    $products = get_prod_specif($id);

    if ($products[6] == $_SESSION['user_id'])
    {
        $conexao = new mysql();
        $mysqli = $conexao->getConexao();
        $user_id = $_SESSION['user_id'];
        $com = ("delete from ". $conexao::$db_table_products. " where id=$id;");
        $delete_prod = mysqli_query($mysqli, $com);
        unlink($path);
    }

    header("Location: /admin");

}

function get_all_category(){

    $valor = "";

    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $com = ("select * from ". $conexao::$db_table_category. ";");
    $getcategory = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($getcategory) > 0) {
        while ($linha = mysqli_fetch_assoc($getcategory)) {
            $valor = $valor. '<option>'. $linha["name"] .'</option>';
        }
    }
    else{
        $valor = "Sem categorias registradas";
    }
    return $valor;
}


function get_specif_category($name){

    $category_info = array();

    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $com = ("select * from ". $conexao::$db_table_category. " where name='". $name ."';");
    $getinfocategory = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($getinfocategory) > 0) {
        while ($linha = mysqli_fetch_assoc($getinfocategory)) {
            $category_info = array(
                $linha["id"],
                $linha["name"],
                $linha["icon"]
            );
        }
    }
    else{
        $category_info = -1;
    }
    

    return $category_info;
}


function get_seller_info($id){

    $seller = array();
    
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $com = ("select * from ". $conexao::$db_table_users. " where id=". $id .";");
    $infos = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($infos) > 0) {
        while ($linha = mysqli_fetch_assoc($infos)) {
            $seller = array(
                $linha["id"], //0
                $linha["username"], //1
                $linha["email"], //2
                $linha["role"], //3
                $linha["pfp"], //4
                $linha["verified"], //5
                $linha["description"] //6

            );
        }
    }

    return $seller;
}

function get_all_seller_products($id){
    $all_products = '<div class="row align-items-center">';
    $counter = 0;
    settype($counter, "int");
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $com = ("select * from ". $conexao::$db_table_products. " where owner=". $id .";");
    $infos = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($infos) > 0) {
        while ($linha = mysqli_fetch_assoc($infos)) {
            $counter = $counter + 1;
            $title_short = mb_strimwidth($linha["title"], 0, 23, "...");
            $all_products = $all_products . '<div class="col"><div class="mdcard"> <a href="/product?id='. $linha["id"] .'" style="text-decoration: none;"><div class="card" style="width: 17rem;height: 18rem;"> <img src="../Assets/imgs/products/'. $linha["image"] .'" class="card-img-top cardimg"> <div class="card-body">   <h5 class="card-title text-start card-titulo">'. $title_short .'</h5>   <h6 class="text-start card-preco">R$'. $linha["price"] .'</h6> </div> </div> </a></div> </div>';

            if ($counter == 4){
                $all_products = $all_products . '</div><div class="row align-items-center">';
            }
            if ($counter == 8){
                $all_products = $all_products . '</div><div class="row align-items-center">';
            }
            if ($counter == 12){
                $all_products = $all_products . '</div><div class="row align-items-center">';
            }
            if ($counter == 16){
                $all_products = $all_products . '</div><div class="row align-items-center">';
            }

        }
        $all_products = $all_products . '</div>';
    }

    debug_to_console($all_products);
    return $all_products;
}



function get_all_purchases(){
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();
    $retornar = '<div class="row"> <div class="col"> <i>Produto:</i> </div> <div class="col-5"> <i>Valor:</i> </div> <div class="col"> <i>ações:</i> </div> </div> </div>';
    $count = 0;
    $com = 'SELECT p.product_id, p.payment_id, p.payment_method, p.value, p.status, p.payment_date, p.costumer_id, p.costumer_id_cpf, p.costumer_bank, p.costumer_email, p.seller_id, p.payment_ip, pr.id, pr.title, pr.description, pr.price, pr.image, pr.id_category, pr.owner FROM '. $conexao::$db_table_payments .' p INNER JOIN '. $conexao::$db_table_products .' pr ON p.product_id=pr.id WHERE p.costumer_id='. $_SESSION['user_id'] .';';
    $getpurchases = mysqli_query($mysqli, $com);
    if (mysqli_num_rows($getpurchases) > 0) {
        while($linha = mysqli_fetch_assoc($getpurchases)){
            
            $count = $count + 1;
            switch($linha['status']){
                case 'accredited':
                    $retornar = $retornar . '<div class="compra"> <div class="row"> <div class="col justify-content-start"> <img width="50%" src="../Assets/imgs/products/'. $linha['image'] .'"> </div> <div class="col-5 justify-content-center"> <h1 class="text-start">'. $linha['title'] .'</h1> <h2 class="detail text-start">#'. $linha['payment_id'] .' | Metódo: '. $linha['payment_method'] .'</h2> </div> <div class="col text-center justify-content-end"> <div class="infos"> <div class="col text-center"> <h3 class="">R$'. $linha['value'] .'</h3><br> </div> <div class="col text-center"> <h2 class="text-center center text-status text-success">Aprovado</h2> </div> <div class="col text-center"><a href="/details?id='. $linha['payment_id'] .'&img='. $linha['image'] .'&product_id='. $linha['id'] .'"><button class="btn btn-primary "> <i class="fa-solid fa-circle-info"></i></button></a> </div> </div> </div> </div> </div>';
                    break;
                case 'approved':
                    $retornar = $retornar . '<div class="compra"> <div class="row"> <div class="col justify-content-start"> <img width="50%" src="../Assets/imgs/products/'. $linha['image'] .'"> </div> <div class="col-5 justify-content-center"> <h1 class="text-start">'. $linha['title'] .'</h1> <h2 class="detail text-start">#'. $linha['payment_id'] .' | Metódo: '. $linha['payment_method'] .'</h2> </div> <div class="col text-center justify-content-end"> <div class="infos"> <div class="col text-center"> <h3 class="">R$'. $linha['value'] .'</h3><br> </div> <div class="col text-center"> <h2 class="text-center center text-status text-success">Aprovado</h2> </div> <div class="col text-center"><a href="/details?id='. $linha['payment_id'] .'&img='. $linha['image'] .'&product_id='. $linha['id'] .'"><button class="btn btn-primary "> <i class="fa-solid fa-circle-info"></i></button></a> </div> </div> </div> </div> </div>';
                    break;
                case 'in_process':
                    $retornar = $retornar . '<div class="compra"> <div class="row"> <div class="col justify-content-start"> <img width="50%" src="../Assets/imgs/products/'. $linha['image'] .'"> </div> <div class="col-5 justify-content-center"> <h1 class="text-start">'. $linha['title'] .'</h1> <h2 class="detail text-start">#'. $linha['payment_id'] .' | Metódo: '. $linha['payment_method'] .'</h2> </div> <div class="col text-center justify-content-end"> <div class="infos"> <div class="col text-center"> <h3 class="">R$'. $linha['value'] .'</h3><br> </div> <div class="col text-center"> <h2 class="text-center center text-status text-warning">Processando</h2> </div> <div class="col text-center"><a href="/details?id='. $linha['payment_id'] .'&img='. $linha['image'] .'&product_id='. $linha['id'] .'"><button class="btn btn-primary "> <i class="fa-solid fa-circle-info"></i></button></a> </div> </div> </div> </div> </div>';
                    break;
                case 'rejected':
                    $retornar = $retornar . '<div class="compra"> <div class="row"> <div class="col justify-content-start"> <img width="50%" src="../Assets/imgs/products/'. $linha['image'] .'"> </div> <div class="col-5 justify-content-center"> <h1 class="text-start">'. $linha['title'] .'</h1> <h2 class="detail text-start">#'. $linha['payment_id'] .' | Metódo: '. $linha['payment_method'] .'</h2> </div> <div class="col text-center justify-content-end"> <div class="infos"> <div class="col text-center"> <h3 class="">R$'. $linha['value'] .'</h3><br> </div> <div class="col text-center"> <h2 class="text-center center text-status text-danger">Recusado</h2> </div> <div class="col text-center"><a href="/details?id='. $linha['payment_id'] .'&img='. $linha['image'] .'&product_id='. $linha['id'] .'"><button class="btn btn-primary "> <i class="fa-solid fa-circle-info"></i></button></a> </div> </div> </div> </div> </div>';
                    break;
            }

            
            //$retornar = $retornar . '<div class="compra"> 	<div class="row"> 		<div class="col justify-content-start"> 			<img class="img-fluid" width="50%" src="../Assets/imgs/products/'. $linha['image'] .'"> 		</div> 		<div class="col-5 justify-content-center"> 			<h1 class="text-start">'. $linha['title'] .'</h1> 			<h2 class="detail text-start">#'. $linha['payment_id'] .' | Metódo: '. $linha['payment_method'] .'</h2> 		</div> 		<div class="col justify-content-end"> 			<div class="infos"> 				<h3 class="text-center">R$'. $linha['value'] .'</h3><br> 				<a href="/details?id='. $linha['payment_id'] .'&img='. $linha['image'] .'&product_id='. $linha[''] .'"><button class="btn btn-primary"> <i class="fa-solid fa-circle-info"></i></button></a> 			</div> 		</div> 	</div> </div>';
        }
    }
    else{
        $retornar = '<h1 style="margin-top: 2vh;" class="text-danger">Você não possui nenhuma compra registrada!</h1>';
    }
    return $retornar;
}




ob_end_flush();




?>