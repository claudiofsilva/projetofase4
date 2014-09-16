<?php

require_once "conexao.php";

echo "#### Executando Fixture####\n";

//conexão com banco de dados
$conn = conexao();

echo "Removendo tabela\n";

//excluindo tabela
$conn->query("DROP TABLE IF EXISTS login");

echo " - Ok\n";

echo "Criando Tabela Login\n";

//Criando tabela Login
$criacaoTabelaLogin = "CREATE TABLE login(
			id int(4) NOT NULL AUTO_INCREMENT,
			nome VARCHAR(50) NOT NULL,
			senha VARCHAR(255),
			PRIMARY KEY (id))";

$stmt = $conn->prepare($criacaoTabelaLogin);
$stmt->execute();

echo " - Ok criação tabela login\n";

echo "Inserindo dados tabela login\n";
$options = array('cost' => 10);

//dados tabela login
$dadosTabelaLogin = array(
    1 => array(
        'nome' => 'claudio',
        'senha' => password_hash('12345',PASSWORD_DEFAULT,$options)
    ),
    2 => array(
        'nome' => 'admin',
        'senha' => password_hash('codeeducation',PASSWORD_DEFAULT,$options)
    )
);

//inserindo dados tabela login
$inserirDadosTabelaLogin = " INSERT INTO login (nome,senha) VALUES ('{$dadosTabelaLogin[1]['nome']}','{$dadosTabelaLogin[1]['senha']}');
                        INSERT INTO login (nome,senha) VALUES ('{$dadosTabelaLogin[2]['nome']}','{$dadosTabelaLogin[2]['senha']}')";


$conn->exec($inserirDadosTabelaLogin);

echo " - Ok Dados inseridos na tabela login\n";


echo "####Removendo tabela paginas####\n";

//excluindo tabela paginas se existir
$conn->query("DROP TABLE IF EXISTS paginas");

echo " - Ok\n";

echo "Criando Tabela Paginas\n";

//Criando tabela paginas
$criacaoTabelaPaginas = "CREATE TABLE paginas(
			id int(4) NOT NULL AUTO_INCREMENT,
			nome VARCHAR(50) NOT NULL,
			descricao VARCHAR(255),
			PRIMARY KEY (id))";

$stm = $conn->prepare($criacaoTabelaPaginas);
$stm->execute();

echo " - Ok criação tabela Paginas\n";

echo "Inserindo dados tabela Paginas\n";


//dados tabela paginas
$dadosTabelaPaginas = array(
    1 => array(
        'nome' => 'home',
        'descricao' => 'pagina home'
    ),
    2 => array(
        'nome' => 'produtos',
        'descricao' => 'pagina produtos'
    ),
    3 => array(
        'nome' => 'servicos',
        'descricao' => 'pagina serviços'
    ),
    4 => array(
        'nome' => 'contato',
        'descricao' => 'pagina contato'
    ),
    5 => array(
        'nome' => 'empresa',
        'descricao' => 'pagina empresa'
    )
);

//inserindo dados tabela paginas
$inserirDadosTabelaPaginas = " INSERT INTO paginas (nome,descricao) VALUES ('{$dadosTabelaPaginas[1]['nome']}','{$dadosTabelaPaginas[1]['descricao']}');
                               INSERT INTO paginas (nome,descricao) VALUES ('{$dadosTabelaPaginas[2]['nome']}','{$dadosTabelaPaginas[2]['descricao']}');
                               INSERT INTO paginas (nome,descricao) VALUES ('{$dadosTabelaPaginas[3]['nome']}','{$dadosTabelaPaginas[3]['descricao']}');
                               INSERT INTO paginas (nome,descricao) VALUES ('{$dadosTabelaPaginas[4]['nome']}','{$dadosTabelaPaginas[4]['descricao']}');
                               INSERT INTO paginas (nome,descricao) VALUES ('{$dadosTabelaPaginas[5]['nome']}','{$dadosTabelaPaginas[5]['descricao']}')";


$conn->exec($inserirDadosTabelaPaginas);

echo " - Ok Dados inseridos na tabela Paginas\n";

echo "Concluído\n";

