<?php

require_once "conexao.php";

echo "#### Executando Fixture####\n";

$conn = conexao();

echo "Removendo tabela\n";

$conn->query("DROP TABLE IF EXISTS paginas");

echo " - Ok\n";

echo "Criando Tabela\n";

$conn->query("CREATE TABLE paginas(
			id int(4) NOT NULL AUTO_INCREMENT,
			nome VARCHAR(255) NOT NULL,
			descricao VARCHAR(255),
			PRIMARY KEY (id)");

echo " - Ok\n";

echo "Inserindo dados";

$conn->query("INSERT INTO paginas (nome,descricao) VALUES ('home','pagina home');
                        INSERT INTO paginas (nome,descricao) VALUES ('produtos','pagina produto');
                        INSERT INTO paginas (nome,descricao) VALUES ('servicos','pagina servicos');
                        INSERT INTO paginas (nome,descricao) VALUES ('contato','pagina contato');
                        INSERT INTO paginas (nome,descricao) VALUES ('empresa','pagina empresa')");
$conn->execute();

echo " - Ok\n";

echo "Concluído";

