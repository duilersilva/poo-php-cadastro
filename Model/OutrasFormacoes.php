<?php

class Outrasformacoes
{ // Classe OutrasFormacoes
    // Atributos da classe OutrasFormacoes
    private $id; // Atributo privado para armazenar o ID da formação
    private $idusuario; // Atributo privado para armazenar o ID do usuário
    private $inicio; // Atributo privado para armazenar a data de início da formação
    private $fim; // Atributo privado para armazenar a data de fim da formação
    private $descricao; // Atributo privado para armazenar a descrição da formação

    // Construtor da classe OutrasFormacoes
    public function setID($id)
    { // Método para definir o ID da formação
        $this->id = $id; // Atribui o valor do parâmetro $id ao atributo $id da classe
    }
    public function getID()
    { // Método para obter o ID da formação
        return $this->id; // Retorna o valor do atributo $id da classe
    }
    public function setIDUsuario($idusuario)
    { // Método para definir o ID do usuário associado à formação
        $this->idusuario = $idusuario; // Atribui o valor do parâmetro $idusuario ao atributo $idusuario da classe
    }
    public function getIDUsuario()
    { // Método para obter o ID do usuário associado à formação
        return $this->idusuario; // Retorna o valor do atributo $idusuario da classe
    }
    public function setInicio($inicio)
    { // Método para definir a data de início da formação
        $this->inicio = $inicio; // Atribui o valor do parâmetro $inicio ao atributo $inicio da classe
    }
    public function getInicio()
    { // Método para obter a data de início da formação
        return $this->inicio; // Retorna o valor do atributo $inicio da classe
    }
    public function setFim($fim)
    { // Método para definir a data de fim da formação
        $this->fim = $fim; // Atribui o valor do parâmetro $fim ao atributo $fim da classe
    }
    public function getFim()
    { // Método para obter a data de fim da formação
        return $this->fim; // Retorna o valor do atributo $fim da classe
    }
    public function setDescricao($descricao)
    { // Método para definir a descrição da formação
        $this->descricao = $descricao; // Atribui o valor do parâmetro $descricao ao atributo $descricao da classe
    }
    public function getDescricao()
    { // Método para obter a descrição da formação
        return $this->descricao; // Retorna o valor do atributo $descricao da classe
    }

    // Método para inserir os dados da formação no banco de dados
    public function inserirBD()
    { // Método para inserir os dados da formação no banco de dados

        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }

        $sql = "INSERT INTO outrasformacoes (idusuario, inicio, fim, descricao) VALUES 
            ('" . $this->idusuario . "', '" . $this->inicio . "', '" . $this->fim . "', '" . $this->descricao . "')"; // Cria a consulta SQL para inserir os dados da formação na tabela outrasformacoes

        if ($conn->query($sql) === TRUE) { // Executa a consulta SQL e verifica se foi bem-sucedida
            $this->id = mysqli_insert_id($conn); // Obtém o ID gerado automaticamente pela inserção
            $conn->close(); // Fecha a conexão com o banco de dados
            return TRUE; // Se a consulta for bem-sucedida, retorna TRUE
        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Se a consulta falhar, retorna FALSE
        }
    }


    // Método para excluir os dados de outras formações no banco de dados
    public function excluirBD($id)
    {

        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM outrasformacoes WHERE idoutrasformacoes = '" . $id . "'"; // Cria a consulta SQL para excluir os dados da formação na tabela outrasformacoes

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE; // Se a consulta for bem-sucedida, retorna TRUE
        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Se a consulta falhar, retorna FALSE
        }
    }



    public function listaroFormacoes($idusuario)
    {

        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }

        $sql = "SELECT * FROM outrasformacoes WHERE idusuario = '" . $idusuario . "';"; // Cria a consulta SQL para selecionar os dados da formação na tabela outrasformacoes
        $re = $conn->query($sql); // Executa a consulta SQL e armazena o resultado na variável $re
        $conn->close(); // Fecha a conexão com o banco de dados
        return $re; // Retorna o resultado da consulta
    }

    //fim classe 
}
