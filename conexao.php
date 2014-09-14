<?php

function conexao(){
    try{
        $config = include "config.php";

        if(!isset($config['db'])){
            throw new \InvalidArgumentException('Não existe configuração banco de dados');
        }

        $host = (isset($config['db']['host'])) ? $config['db']['host'] : null;
        $dbName = (isset($config['db']['dbname'])) ? $config['db']['dbname'] : null;
        $user = (isset($config['db']['user'])) ? $config['db']['user'] : null;
        $password = (isset($config['db']['password'])) ? $config['db']['password'] : null;

        return new \PDO("mysql:host={$host};dbname={$dbName}",$user,$password);


    }
    catch(\PDOException $e){
        echo "Nao foi possivel conectar ao banco de dados, mensagem: ".$e->getMessage().' , codigo de erro:'. $e->getCode();
    }
}
