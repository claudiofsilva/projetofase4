<?php
session_start();

if($_SESSION['logado']){
    require_once 'conexao.php';

    $db = conexao();

    $query = "SELECT * FROM paginas";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);


    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Listagem de conteudo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/fase1.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <?php if(!$_GET and !$_POST) { ?>
            <ul class="list-group">
                <?php foreach($resultado as $paginas) { ?>
                    <li class="list-group-item"><?php echo $paginas['nome'].' - '.$paginas['descricao']?> <a class="pull-right" href="/paginas-editar.php?id=<?php echo $paginas['id']?>">Editar</a></li>
                <?php } ?>
            </ul>
        <?php } elseif($_GET) {
            $id = $_GET['id'];
            $queryEditar = "SELECT * FROM paginas WHERE id = :id";
            $stmt = $db->prepare($queryEditar);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $retornoPaginas = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($retornoPaginas) { ?>
                <form role="form" action="paginas-editar.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $retornoPaginas['id']?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome Pagina</label>
                        <input type="text" class="form-control" name="nome-pagina" value="<?php echo $retornoPaginas['nome']?>" >
                    </div>
                    <label for="exampleInputEmail1">Descrição pagina</label>
                    <textarea class="form-control" rows="3" name="descricao-pagina"><?php echo $retornoPaginas['descricao']?></textarea>
                    <button class="atualizar" type="submit" class="btn btn-default">Atualizar</button>
                </form>
            <?php } ?>
        <?php } elseif($_POST) {
            $titulo = $_POST['nome-pagina'];
            $descricao = $_POST['descricao-pagina'];
            $id = $_POST['id'];

            $queryUpdate = "UPDATE paginas SET nome = :nome ,descricao = :descricao WHERE id = :id";
            $stmt = $db->prepare($queryUpdate);
            $stmt->bindValue(':nome',$titulo);
            $stmt->bindValue(':descricao',$descricao);
            $stmt->bindValue(':id',$id);
            $dadosUpdate = $stmt->execute();

            if($dadosUpdate){
                echo "atualizou";
            }else{
                echo "não atualizou";
            }

            ?>
        <?php } ?>

    </div>
    </body>
    </html>


<?php }else{
    header('location:/admin.php');
}
?>