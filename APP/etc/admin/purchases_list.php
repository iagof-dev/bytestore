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
        $result = $api->GET_PURCHASES_BY_CUSTOMERID($user->getID());

        $RETURN_STRING = '';

        foreach ($result['message'] as $code) {

            $img_name = $code['image'];
            $img = "/../Assets/imgs/products/" . $img_name;
            $id = $code['id'];
            $titulo = $code['title'];
            $desc = $code['description'];



            // if (strlen($code['price']) > 5 && strlen($code['price']) < 11)
            //     $valor = substr_replace($code['price'], '.', -6, 0);

            $valor = str_replace('.', ',', $code['price']);


            $data = date("d/m/Y", strtotime($code['date']));
            $hora = substr(date("H:i:s", strtotime($code['date'])), 0, -3);

            $status = $code['pag_status'];
            $p_status = "";
            if($status == 'approved')
                $p_status = '<span class="text-green-400">Aprovado</span>';
            if($status == 'refunded')
                $p_status = '<span class="text-red-600">Reembolsado</span>';
            if($status == 'denied')
                $p_status = '<span class="text-red-600">Negado</span>';
            if($status == 'pending')
                $p_status = '<span class="text-orange-400">Pendente</span>';
   

            $RETURN_STRING .= ("<div class='grid items-center place-items-center mt-5'>
        <div class='flex flex-grow h-24 shadow-md bg-[#f8f7f7] rounded-md'>
            <img src='$img' class='w-[7rem] rounded-lg max-w-[20rem]' />
            <div class='grid ml-2 w-[50rem] text-start'>
                <a href='/anuncio?id=$id'><h1 class='text-sm text-black font-medium pt-2.5 pb-1'>". substr($titulo, 0, 100) . "</h1></a>
                <h3 class='text-green-600 font-medium mt-[-0.5rem]'>R$ $valor</h3>
                <h3 class='font-medium text-sm mt-[-0.3rem]'>Status: $p_status</h3>
                <h2 class='text-xs font-normal text-gray-400 mt-[-0.2rem]'>Criado <span>$data às $hora</span></h2>
                <div class='grid align-middle place-items-end text-center'>
                    <div class='buttons flex w-14 h-16 mt-[-3rem] mr-5'>
                        <a href=''><button><img class='select-none invisible' src='../Assets/imgs/icons/solid/pencil.svg' /></button></a>
                        <a href='/'><button><img class='select-none' src='../Assets/imgs/icons/solid/information-circle.svg' /></button></a>
                    </div>
                </div>
            </div>
        </div>
        </div>");
        }

        if(empty($RETURN_STRING) || !isset($RETURN_STRING)){
            $RETURN_STRING = '<h1 class="text-red-600">Nenhum anúncio ativo :(</h1>';
        }

        return $RETURN_STRING;
    }
}
