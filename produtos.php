<div class="jumbotron">
    <?php
    require_once 'pagina.php';
    $home = new Pagina();
    $home->setNomePagina('produtos');
    $conteudoPagina = $home->exibeConteudo();

    if($conteudoPagina){ ?>
        <h1><?php echo $conteudoPagina['nome']; ?></h1>
        <p class="lead"><?php echo $conteudoPagina['descricao']; ?></p>
        <p><a class="btn btn-lg btn-success" href="#" role="button"><?php echo $conteudoPagina['nome']; ?></a></p>
    <?php } ?>

</div>
