
<?php if(!$_POST) { ?>

    <form class="form-horizontal" role="form" method="post" action="">
        <div class="form-group">
            <label for="inputEmail4" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="inputEmail4" placeholder="Nome" name="nome">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Assunto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail5" placeholder="Assunto" name="assunto">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail5" class="col-sm-2 control-label">Mensagem</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="mensagem"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
        </div>
    </form>

<?php } else { ?>

    <div class="panel panel-default">
        <div class="panel-body">
            Dados enviados com sucesso, abaixo seguem os dados que você enviou
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Informações Formulario</h3>
        </div>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nome:</strong> <?php echo $_POST['nome']; ?></li>
            <li class="list-group-item"><strong>Email:</strong>  <?php echo $_POST['email']; ?></li>
            <li class="list-group-item"><strong>Assunto:</strong> <?php echo $_POST['assunto']; ?></li>
            <li class="list-group-item"><strong>Mensagem:</strong> <?php echo $_POST['mensagem']; ?></li>

        </ul>
    </div>

<?php } ?>
