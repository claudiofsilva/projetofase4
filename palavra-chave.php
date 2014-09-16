<?php
if(!$_POST){
    ?>
    <form class="form-horizontal" role="form" method="post" action="">
        <div class="form-group">
            <label for="inputEmail2" class="col-sm-2 control-label">Buscar Palavra Chave</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="inputEmail4" placeholder="Palavra chave" name="palavraChave">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
        </div>
    </form>
<?php } else {

    require_once 'pagina.php';
    $pagina = new Pagina();

    if($_POST['palavraChave']){

        $pagina->setBusca($_POST['palavraChave']);

        if($pagina->buscar()){
            foreach($pagina->buscar() as $busca){
                echo "<a href=".$busca['nome'].">".$busca['descricao']."</a><br>";
            }
        }

    }
}
?>