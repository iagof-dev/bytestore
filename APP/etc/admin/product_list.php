<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ADMIN_PRODUCTS_LIST
{

    public function GET()
    {

        require_once(__DIR__ . "/../../api/routes.php");
        require_once(__DIR__ . "/../../Model/usuario.php");

        $api = new API();
        $user = new user();
        $result = $api->GET_PRODUCTS_BY_OWNER($user->getId());

        $RETURN_STRING = '';

        foreach($result['DATA'] as $code){

        $img = "/../Assets/imgs/products/" . $code['image'];
        $id = $code['id'];
        $titulo = $code['title'];
        $valor = $code['price'];
        $data = date("d/m/Y",strtotime($code['created']));
        $hora = substr(date("H:i:s", strtotime($code['created'])), 0, -3);



        $RETURN_STRING .= ("<div class='grid items-center place-items-center mt-5'>
        <div class='flex flex-grow h-24 bg-pink-300 rounded-md'>
            <img src='$img' class='w-30 rounded-lg' />
            <div class='grid ml-2 w-[50rem] text-start'>
                <h1 class='text-sm font-medium pt-2.5'>$titulo</h1>
                <h3 class='text-green-600 mt-[-0.8rem]'>R$ $valor</h3>
                <h2 class='text-xs font-normal text-gray-200 mt-[-0.6rem]'>Criado <span>$data às $hora</span></h2>
                <div class='grid align-middle place-items-end text-center'>
                    <div class='buttons flex w-14 h-16 mt-[-3rem] mr-5'>
                        <a href='/anuncio/editar/$id'><button><img src='../Assets/imgs/icons/solid/pencil.svg' /></button></a>
                        <a href='/anuncio/deletar/$id'><button><img src='../Assets/imgs/icons/solid/trash.svg' /></button></a>
                    </div>
                </div>
            </div>
        </div>
        </div>");
    }

    return $RETURN_STRING;
    }
}
