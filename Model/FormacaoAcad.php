<?php

class FormacaoAcad
{ // Classe FormacaoAcademica

    // Atributos da classe FormacaoAcademica

    private $id; // Atributo privado para armazenar o ID da formação acadêmica
    private $idusuario; // Atributo privado para armazenar o ID do usuário associado à formação acadêmica
    private $inicio; // Atributo privado para armazenar o inicio do curso
    private $fim; // Atributo privado para armazenar fim do curso
    private $descricao; // Atributo privado para armazenar a descrição da formação acadêmica


    public function setID($id)
    { // Método para definir o ID da formação acadêmica
        $this->id = $id; // Atribui o valor do parâmetro $id ao atributo $id da classe
    }
    public function getID()
    { // Método para obter o ID da formação acadêmica
        return $this->id; // Retorna o valor do atributo $id da classe
    }
    public function setIDUsuario($idusuario)
    { // Método para definir o ID do usuário associado à formação acadêmica
        $this->idusuario = $idusuario; // Atribui o valor do parâmetro $idusuario ao atributo $idusuario da classe
    }
    public function getIDUsuario()
    { // Método para obter o ID do usuário associado à formação acadêmica
        return $this->idusuario; // Retorna o valor do atributo $idusuario da classe
    }
    public function setInicio($inicio)
    { // Método para definir o início do curso
        $this->inicio = $inicio; // Atribui o valor do parâmetro $inicio ao atributo $inicio da classe
    }
    public function getInicio()
    { // Método para obter o início do curso
        return $this->inicio; // Retorna o valor do atributo $inicio da classe
    }
    public function setFim($fim)
    { // Método para definir o fim do curso
        $this->fim = $fim; // Atribui o valor do parâmetro $fim ao atributo $fim da classe
    }
    public function getFim()
    { // Método para obter o fim do curso
        return $this->fim; // Retorna o valor do atributo $fim da classe
    }
    public function setDescricao($descricao)
    { // Método para definir a descrição da formação acadêmica
        $this->descricao = $descricao; // Atribui o valor do parâmetro $descricao ao atributo $descricao da classe
    }
    public function getDescricao()
    { // Método para obter a descrição da formação acadêmica
        return $this->descricao; // Retorna o valor do atributo $descricao da classe
    }


    public function inserirBD()
    { // Método para inserir os dados da formação acadêmica no banco de dados
        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }
        $sql = "INSERT INTO formacaoacademica (idusuario, inicio, fim, descricao) VALUES 
            ('" . $this->idusuario . "', '" . $this->inicio . "', '" . $this->fim . "', '" . $this->descricao . "')"; // Cria a consulta SQL para inserir os dados da formação acadêmica na tabela formacaoacademica

        if ($conn->query($sql) === TRUE) { // Executa a consulta SQL e verifica se foi bem-sucedida
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE; // Se a consulta for bem-sucedida, retorna TRUE
        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Se a consulta falhar, retorna FALSE
        }
    }


    public function excluirBD($id)
    { // Método para excluir uma formação acadêmica do banco de dados
        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }

        $sql = "DELETE FROM formacaoacademica WHERE idformacaoAcademica = '" . $id . "';"; // ver depois Cria a consulta SQL para excluir a formação acadêmica com o ID especificado

        if ($conn->query($sql) === TRUE) { // Executa a consulta SQL e verifica se foi bem-sucedida
            $conn->close(); // Fecha a conexão com o banco de dados
            return TRUE; // Se a consulta for bem-sucedida, retorna TRUE
        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Se a consulta falhar, retorna FALSE
        }
    }


    public function listarFormacoes($idusuario)
    {
        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }

        $sql = "SELECT * FROM formacaoacademica WHERE idusuario = '" . $idusuario . "';"; // Cria a consulta SQL para selecionar todas as formações acadêmicas do usuário com o ID especificado

        $re = $conn->query($sql); // Executa a consulta SQL e armazena o resultado na variável $re
        $conn->close(); // Fecha a conexão com o banco de dados
        return $re; // Retorna o resultado da consulta
    }
}
