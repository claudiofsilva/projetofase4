<?php
//Valida rota
function rotas($parametro){
    //Se n�o foi passado parametro chama arquivo home.php
    if(!$parametro){
        return 'home.php';
    }else{
        //rotas validas
        $rotasValidas = array('empresa','contato','produtos','home','servicos','palavra-chave');

        //Verifica se o parametro � uma rota valida
        if(in_array($parametro,$rotasValidas)){
            return  $parametro.'.php';
        }else{
            return 'erro.php';
        }

    }
}

ini_set('display_errors', true);
error_reporting(E_ALL | E_STRICT);

//Pega request
$rota = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

//formata o path
$path= preg_replace('(^/)','',$rota['path']);

//Verifica se existe erro e retorna STATUS CODE 404
if(rotas($path) == 'erro.php'){
    header('location:/erro.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto fase 4</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fase1.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h3 class="text-muted">Projeto fase 4</h3>
    <?php require_once 'menu.php' ?>
    <?php
        require_once (rotas($path));
     ?>

    <?php require_once 'footer.php';?>

</div>

</body>
</html>
