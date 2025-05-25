<?php
class Administrador
{
    private $id;
    private $nome;
    private $cpf;
    private $senha;
    //Id 
    public function setID($id)
    {
        $this->id = $id;
    }
    public function getID()
    {
        return $this->id;
    }
    //Nome
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    //Cpf
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    //Senha
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function carregarAdministrador($cpf)
    {
        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Criação de um objeto da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados	
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error); // Exibe mensagem de erro se a conexão falhar
        }
        $sql = "SELECT * FROM administrador WHERE cpf = " . $cpf; // Consulta SQL para selecionar o administrador com o CPF fornecido	    
        $re = $conn->query($sql); // Executa a consulta SQL
        $r = $re->fetch_object(); // Obtém o resultado da consulta como um objeto
        if ($r != null) { // Verifica se o resultado não é nulo
            $this->id = $r->idadministrador; // Define o ID do administrador
            $this->nome = $r->nome; // Define o nome do administrador
            $this->cpf = $r->cpf; // Define o CPF do administrador  
            $this->senha = $r->senha; // Define a senha do administrador    
            $conn->close(); // Fecha a conexão com o banco de dados
            return TRUE; // Retorna TRUE se o administrador for encontrado
        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Retorna FALSE se o administrador não for encontrado
        }
    }

    public function listaCadastrados()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT idadministrador, nome, cpf FROM administrador;";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }
}
