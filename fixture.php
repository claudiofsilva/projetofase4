<?php

require_once "conexao.php";

echo "#### Executando Fixture####\n";

//conexão com banco de dados
$conn = conexao();

echo "Removendo tabela\n";

//excluindo tabela
$conn->query("DROP TABLE IF EXISTS paginas");

echo " - Ok\n";

echo "Criando Tabela\n";

//Criando tabela
$criacaoTabela = "CREATE TABLE paginas(
			id int(4) NOT NULL AUTO_INCREMENT,
			nome VARCHAR(255) NOT NULL,
			descricao VARCHAR(255),
			PRIMARY KEY (id))";

$stmt = $conn->prepare($criacaoTabela);
$stmt->execute();

echo " - Ok\n";

echo "Inserindo dados";

//inserindo dados tabela
$inserirDadosTabela = " INSERT INTO paginas (nome,descricao) VALUES ('home','pagina home');
                        INSERT INTO paginas (nome,descricao) VALUES ('produtos','pagina produto');
                        INSERT INTO paginas (nome,descricao) VALUES ('servicos','pagina servicos');
                        INSERT INTO paginas (nome,descricao) VALUES ('contato','pagina contato');
                        INSERT INTO paginas (nome,descricao) VALUES ('empresa','pagina empresa')";

$conn->exec($inserirDadosTabela);

echo " - Ok\n";

echo "Concluído";

