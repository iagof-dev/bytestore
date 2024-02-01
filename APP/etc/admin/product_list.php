<?php



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
        
        foreach ($result['DATA'] as $code) {
            
            $img_name = $code['image'];
            $img = "/../Assets/imgs/products/" . $img_name;
            $id = $code['id'];
            $titulo = $code['title'];
            $desc = $code['description'];
            
            $valor = str_replace('.', ',', $code['price']);
            
            
            $data = date("d/m/Y", strtotime($code['created']));
            $hora = substr(date("H:i:s", strtotime($code['created'])), 0, -3);
            
            
            
            $RETURN_STRING .= ("<div class='grid items-center place-items-center mt-5'>
            <div class='flex flex-grow h-24 shadow-md bg-[#f8f7f7] rounded-md'>
            <img src='$img' class='w-[7rem] rounded-lg max-w-[20rem]' />
            <div class='grid ml-2 w-[50rem] text-start'>
            <a href='/anuncio?id=$id'><h1 class='text-sm text-black font-medium pt-2.5 pb-1'>". wordwrap($titulo, 105, "<br>\n"). "</h1></a>
            <h3 class='text-green-600 font-medium mt-[-0.5rem]'>R$ $valor</h3>
            <h2 class='text-xs font-normal text-gray-400 mt-[-0.2rem]'>Criado <span>$data às $hora</span></h2>
            <div class='grid align-middle place-items-end text-center'>
            <div class='buttons flex w-14 h-16 mt-[-3rem] mr-5'>
            <a href='/editar?id=$id&title=$titulo&price=$valor&desc=$desc&img=$img_name'><button><img class='select-none' src='../Assets/imgs/icons/solid/pencil.svg' /></button></a>
            <a href='/admin?id=$id&action=delete&confirmed=false&img=$img_name'><button><img class='select-none' src='../Assets/imgs/icons/solid/trash.svg' /></button></a>
            </div>
            </div>
            </div>
            </div>
            </div>");
        }
        
        if(empty($RETURN_STRING) || !isset($RETURN_STRING)){
            $RETURN_STRING = '<h1 class="text-red-600">Nenhum anúncio ativo :(</h1><br><div class="grid-cols-1">
            <div class="ml-16">
            <a title="Criar anúncio" href="/create">
            <button class="w-16 font-semibold h-8 text-center leading-tight align-middle rounded-full text-white bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6]">
            Criar
            </button></a>
            </div>
            </div>';
        }
        
        return $RETURN_STRING;
    }
}
