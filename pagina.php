<?php

require_once "conexao.php";

class Pagina {

    private $busca;
    private $nomePagina ;
    private $db;

   public function __construct()
   {
       $conexao = conexao();
       $this->db = $conexao;

   }

   public function buscar()
   {

       $query = "SELECT * FROM paginas WHERE descricao LIKE '%{$this->getBusca()}%'";
       $stmt = $this->db->query($query);
       return $stmt->fetchAll(\PDO::FETCH_ASSOC);

   }

    public function exibeConteudo()
    {
        $query = "SELECT * FROM paginas WHERE nome = :nome";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome",$this->getNomePagina());
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function setBusca($busca)
    {
        $this->busca = $busca;
        return $this;
    }

    public function getBusca()
    {
        return $this->busca;
    }
	
	public function setNomePagina($nomePagina)
    {
        $this->nomePagina = $nomePagina;
        return $this;
    }

    function getNomePagina()
    {
        return $this->nomePagina;
    }
}









