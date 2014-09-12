<?php
session_start();

$_SESSION['logado'] = 0;
?>
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
    <?php
        if(!$_POST){
    ?>
    <form class="form-horizontal" role="form" action="" method="post">
        <div class="form-group">
            <label for="login" class="col-lg-2 control-label">Login</label>
            <div class="col-lg-3">
                <input type="text" name='login' class="form-control"  placeholder="Login">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Senha</label>
            <div class="col-lg-3">
                <input type="password" class="form-control" name="senha" placeholder="Senha">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Entrar</button>
            </div>
        </div>
    </form>
    <?php } else {
            require_once 'conexao.php';
            $senha = $_POST['senha'];
            $login = $_POST['login'];

            if(isset($senha) and isset($login)){
                $db = conexao();

                $query = "SELECT * FROM login WHERE nome = :login ";
                $stmt = $db->prepare($query);
                $stmt->bindValue(":login",$login);
                $stmt->execute();
                $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

                if($resultado){
                    if(password_verify($senha,$resultado['senha'])){
                        $nome_session = $_SESSION['logado']= 1;
                        $_SESSION['usuario'] = $resultado['nome'];
                        header('location:/paginas-editar.php');

                    }else{
                        echo "Login ou senha invalidado";
                    }
                }else{
                    echo "Login ou senha invalido";
                    header('location:/erro.php');
                }


            }

        }
    ?>



</div>

</body>
</html>
