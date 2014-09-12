<?php

require_once "conexao.php";

echo "#### Executando Fixture####\n";

//conexão com banco de dados
$conn = conexao();

echo "Removendo tabela\n";

//excluindo tabela
$conn->query("DROP TABLE IF EXISTS login");

echo " - Ok\n";

echo "Criando Tabela\n";

//Criando tabela
$criacaoTabela = "CREATE TABLE login(
			id int(4) NOT NULL AUTO_INCREMENT,
			nome VARCHAR(50) NOT NULL,
			senha VARCHAR(255),
			PRIMARY KEY (id))";

$stmt = $conn->prepare($criacaoTabela);
$stmt->execute();

echo " - Ok\n";

echo "Inserindo dados";

$options = array('cost' => 10);

$dadosTabela = array(
            1 => array(
                'nome' => 'claudio',
                'senha' => password_hash('12345',PASSWORD_DEFAULT,$options)
            ),
            2 => array(
                'nome' => 'admin',
                'senha' => password_hash('codeeducation',PASSWORD_DEFAULT,$options)
            )
    );

//inserindo dados tabela
$inserirDadosTabela = " INSERT INTO login (nome,senha) VALUES ('{$dadosTabela[1]['nome']}','{$dadosTabela[1]['senha']}');
                        INSERT INTO login (nome,senha) VALUES ('{$dadosTabela[2]['nome']}','{$dadosTabela[2]['senha']}')";


$conn->exec($inserirDadosTabela);

echo " - Ok\n";

echo "Concluído";

