<?php

require_once("./Model/UserData.php");

$client = new user();


$user_ac = '<a title="Fazer login" class="nav-link m-0" href="?login"><i class="fa-solid fa-circle-user"></i> Entrar</a>';

//se não existe/vazia, vai retornar true
if (!empty($client->getId())) {
    $user_ac = ('<div class="dropdown"><button class="btn bts-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i> ' . $client->getname() . '</button><ul class="dropdown-menu bts-dropdown-menu">    <li><a class="dropdown-item bts-dropdown-item" href="#"><i class="fa-regular fa-user"></i>  Perfil</a></li>    <li><a class="dropdown-item bts-dropdown-item" href="/"><i class="fa-solid fa-bag-shopping"></i> Anúncios</a></li>    <li><a class="dropdown-item bts-dropdown-item" href="/settings"><i class="fa-solid fa-gears"></i> Configurações</a></li>    <li><a class="dropdown-item bts-dropdown-item" href="/logout"><i class="fa-solid fa-door-closed"></i> Sair</a></li></ul></div>');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://iagofragnan.com.br" />
    <title>Byte Store | Suprindo seu Universo Digital </title>
    <meta name="keywords" content="ByteStore, Byte Store, byte store, bite store, computador, pc, notebook, peças de computador, computadores, placa de video, placa mãe,Tecnologia, Informática, Componentes, Periféricos, Hardware, Inovação, Computadores, Jogos, Montagem Personalizada, Suporte Especializado, Atendimento ao Cliente, Desempenho, Criatividade, Futuro Digital">
    <meta name="description" content="Sua fonte completa de componentes, periféricos e inovações em informática. Descubra placas, CPUs e GPUs de ponta, periféricos intuitivos e suporte especializado. Monte seu PC ideal e abrace o futuro digital com confiança. Bem-vindo à evolução tecnológica!">
    <link rel="stylesheet" href="../Assets/css/bootstrap.css">
    <link rel="stylesheet" href="../Assets/css/base.css">
    <meta name="author" content="Iago Fragnan">
    <meta name="publisher" content="Iago Fragnan">
    <meta name="robots" content="index, follow">
    <script src="../Assets/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="../Assets/icons/logo/128.webp" type="image/x-icon">
    <script src="https://kit.fontawesome.com/3fc58490c0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="">
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a title="Ir para página inicial" href="/"><img title="LOGO" src="../Assets/icons/logo/256.webp" width="45" height="45" alt="logo"></a>
            <ul class="nav">
                <div class="dropdown"><button class="btn bts-dropdown " type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bars"></i> Categorias</button>
                    <ul class="dropdown-menu bts-dropdown-menu">
                        <li><a class="dropdown-item bts-dropdown-item" href="/">Placeholder</a></li>
                        <li><a class="dropdown-item bts-dropdown-item" href="/">Placeholder</a></li>
                        <li><a class="dropdown-item bts-dropdown-item" href="/">Placeholder</a></li>
                    </ul>
                </div>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <?= $user_ac ?>
                </li>
            </ul>
        </div>
    </nav>
