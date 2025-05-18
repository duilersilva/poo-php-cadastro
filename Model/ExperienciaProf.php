<?php
class Experienciaprof
{ // Classe Experienciaprof
    // Atributos da classe Experienciaprof
    private $id; // Atributo privado para armazenar o ID da experiência profissional
    private $idusuario; // Atributo privado para armazenar o ID do usuário
    private $inicio; // Atributo privado para armazenar a data de início da experiência profissional
    private $fim; // Atributo privado para armazenar a data de fim da experiência profissional
    private $empresa; // Atributo privado para armazenar o nome da empresa
    private $descricao; // Atributo privado para armazenar a descrição da experiência profissional

    // Construtor da classe Experienciaprof
    public function setID($id)
    { // Método para definir o ID da experiência profissional
        $this->id = $id; // Atribui o valor do parâmetro $id ao atributo $id da classe
    }
    public function getID()
    { // Método para obter o ID da experiência profissional
        return $this->id; // Retorna o valor do atributo $id da classe
    }

    public function setIDUsuario($idusuario)
    { // Método para definir o ID do usuário associado à experiência profissional
        $this->idusuario = $idusuario; // Atribui o valor do parâmetro $idusuario ao atributo $idusuario da classe
    }
    public function getIDUsuario()
    { // Método para obter o ID do usuário associado à experiência profissional
        return $this->idusuario; // Retorna o valor do atributo $idusuario da classe
    }

    public function setInicio($inicio)
    { // Método para definir a data de início da experiência profissional
        $this->inicio = $inicio; // Atribui o valor do parâmetro $inicio ao atributo $inicio da classe
    }
    public function getInicio()
    { // Método para obter a data de início da experiência profissional
        return $this->inicio; // Retorna o valor do atributo $inicio da classe
    }

    public function setFim($fim)
    { // Método para definir a data de fim da experiência profissional
        $this->fim = $fim; // Atribui o valor do parâmetro $fim ao atributo $fim da classe
    }
    public function getFim()
    { // Método para obter a data de fim da experiência profissional
        return $this->fim; // Retorna o valor do atributo $fim da classe
    }

    public function setEmpresa($empresa)
    { // Método para definir o nome da empresa
        $this->empresa = $empresa; // Atribui o valor do parâmetro $empresa ao atributo $empresa da classe
    }
    public function getEmpresa()
    { // Método para obter o nome da empresa
        return $this->empresa; // Retorna o valor do atributo $empresa da classe
    }

    public function setDescricao($descricao)
    { // Método para definir a descrição da experiência profissional
        $this->descricao = $descricao; // Atribui o valor do parâmetro $descricao ao atributo $descricao da classe
    }
    public function getDescricao()
    { // Método para obter a descrição da experiência profissional
        return $this->descricao; // Retorna o valor do atributo $descricao da classe
    }
    // Método para inserir os dados da experiência profissional no banco de dados  

    public function inserirBD()
    { // Método para inserir os dados da experiência profissional no banco de dados
        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }

        $sql = "INSERT INTO experienciaprofissional  (idusuario, inicio, fim, empresa, descricao) VALUES 
            ('" . $this->idusuario . "', '" . $this->inicio . "', '" . $this->fim . "', '" . $this->empresa . "', '" . $this->descricao . "')"; // Cria a consulta SQL para inserir os dados da experiência profissional na tabela experienciaprof

        if ($conn->query($sql) === TRUE) { // Executa a consulta SQL e verifica se foi bem-sucedida
            $this->id = mysqli_insert_id($conn); // Obtém o ID gerado automaticamente pela inserção
            $conn->close(); // Fecha a conexão com o banco de dados
            return TRUE; // Se a consulta for bem-sucedida, retorna TRUE
        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Se a consulta falhar, retorna FALSE
        }
    }


    public function excluirBD($id)
    { // Método para excluir uma experiência profissional do banco de dados

        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }

        $sql = "DELETE FROM experienciaprofissional WHERE idexperienciaprofissional = '" . $id . "';"; // Cria a consulta SQL para excluir a experiência profissional com o ID fornecido

        if ($conn->query($sql) === TRUE) { // Executa a consulta SQL e verifica se foi bem-sucedida
            $conn->close(); // Fecha a conexão com o banco de dados
            return TRUE; // Se a consulta for bem-sucedida, retorna TRUE
        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Se a consulta falhar, retorna FALSE
        }
    }


    public function listarExperiencias($idusuario)
    { // Método para listar as experiências profissionais de um usuário
        require_once 'ConexaoBD.php'; // Inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() da classe ConexaoBD para estabelecer a conexão com o banco de dados

        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }

        $sql = "SELECT * FROM experienciaprofissional WHERE idusuario = '" . $idusuario . "';"; // Cria a consulta SQL para selecionar todas as experiências profissionais do usuário com o ID fornecido
        $re = $conn->query($sql); // Executa a consulta SQL e armazena o resultado na variável $re
        $conn->close(); // Fecha a conexão com o banco de dados
        return $re; // Retorna o resultado da consulta
    }
}
