<?php

class Usuario
{    // Classe Usuario
    // Atributos da classe Usuario

    private $id; // Atributo privado para armazenar o ID do usuário
    private $nome; // Atributo privado para armazenar o nome do usuário
    private $cpf; // Atributo privado para armazenar o CPF do usuário
    private $email; // Atributo privado para armazenar o email do usuário
    private $dataNascimento; // Atributo privado para armazenar a data de nascimento do usuário
    private $senha; //  


    // Construtor da classe Usuario
    public function setID($id)
    { // Método para definir o ID do usuário
        $this->id = $id; // Atribui o valor do parâmetro $id ao atributo $id da classe
    }
    public function getID()
    { // Método para obter o ID do usuário
        return $this->id; // Retorna o valor do atributo $id da classe
    }

    public function setNome($nome)
    { // Método para definir o nome do usuário
        $this->nome = $nome; // Atribui o valor do parâmetro $nome ao atributo $nome da classe
    }
    public function getNome()
    { // Método para obter o nome do usuário
        return $this->nome; // Retorna o valor do atributo $nome da classe
    }

    public function setCpf($cpf)
    { // Método para definir o CPF do usuário   
        $this->cpf = $cpf; // Atribui o valor do parâmetro $cpf ao atributo $cpf da classe
    }
    public function getCpf()
    { // Método para obter o CPF do usuário
        return $this->cpf; // Retorna o valor do atributo $cpf da classe
    }

    public function setEmail($email)
    { // Método para definir o email do usuário
        $this->email = $email; // Atribui o valor do parâmetro $email ao atributo $email da classe
    }
    public function getEmail()
    { // Método para obter o email do usuário
        return $this->email; // Retorna o valor do atributo $email da classe
    }

    public function setDataNascimento($dataNascimento)
    { // Método para definir a data de nascimento do usuário
        $this->dataNascimento = $dataNascimento; // Atribui o valor do parâmetro $dataNascimento ao atributo $dataNascimento da classe
    }
    public function getDataNascimento()
    { // Método para obter a data de nascimento do usuário
        return $this->dataNascimento; // Retorna o valor do atributo $dataNascimento da classe
    }

    public function setSenha($senha)
    { // Método para definir a senha do usuário
        $this->senha = $senha; // Atribui o valor do parâmetro $senha ao atributo $senha da classe
    }
    public function getSenha()
    { // Método para obter a senha do usuário
        return $this->senha; // Retorna o valor do atributo $senha da classe     
    }

    public function inserirBD() // Método para inserir os dados do usuário no banco de dados
    {
        require_once 'ConexaoBD.php'; // inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() para obter a conexão com o banco de dados
        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        } // Verifica se a conexão foi bem-sucedida
        // Prepara a consulta SQL para inserir os dados do usuário na tabela "usuario"
        $sql = "INSERT INTO usuario (nome, cpf, email, senha) VALUES 
                    ('" . $this->nome . "','" . $this->cpf . "','" . $this->email . "','" . $this->senha . "')"; // A consulta SQL insere os valores dos atributos da classe na tabela "usuario"
        // Executa a consulta SQL e verifica se a inserção foi bem-sucedida

        if ($conn->query($sql) === TRUE) { // Se a consulta for bem-sucedida
            // Armazena o ID gerado automaticamente na variável $this->id
            // mysqli_insert_id() retorna o ID gerado pela última inserção na tabela
            $this->id = mysqli_insert_id($conn); // Armazena o ID gerado
            $conn->close(); //   Fecha a conexão com o banco de dados
            return TRUE; // Retorna verdadeiro se a inserção for bem-sucedida
        } else { // Se a consulta falhar
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Retorna falso se a inserção falhar
        }
    }

    public function carregarUsuario($cpf) // Carrega os dados do usuário com base no CPF
    {
        require_once 'ConexaoBD.php'; // inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() para obter a conexão com o banco de dados

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }
        $sql = "SELECT * FROM usuario WHERE cpf = " . $cpf; // Consulta SQL para selecionar todos os dados do usuário com o CPF fornecido
        $re = $conn->query($sql); // Executa a consulta SQL e armazena o resultado na variável $re
        $r = $re->fetch_object(); // Obtém o resultado da consulta como um objeto e armazena na variável $r

        // Verifica se o resultado não é nulo (ou seja, se o usuário foi encontrado)
        // Se o usuário for encontrado, armazena os dados do usuário nos atributos da classe

        if ($r != null) { // Verifica se o resultado não é nulo (ou seja, se o usuário foi encontrado)
            $this->id = $r->idusuario; // Armazena o ID do usuário
            $this->nome = $r->nome; // Armazena o nome do usuário
            $this->cpf = $r->cpf; // Armazena o CPF do usuário
            $this->email = $r->email; // Armazena o email do usuário
            $this->dataNascimento = $r->dataNascimento; // Armazena a data de nascimento do usuário
            $this->senha = $r->senha; // Armazena a senha do usuário
            $conn->close(); // Fecha a conexão com o banco de dados111
            return TRUE; // Retorna verdadeiro se o usuário for encontrado

        } else {
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Retorna falso se o usuário não for encontrado
        }
    }

    public function atualizarBD() // Método para atualizar os dados do usuário no banco de dados
    {
        require_once 'ConexaoBD.php'; // inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() para obter a conexão com o banco de dados

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }
        // Prepara a consulta SQL para atualizar os dados do usuário na tabela "usuario"
        $sql = "UPDATE usuario SET 
            nome='" . $this->nome . "',
            cpf='" . $this->cpf . "', 
            dataNascimento='" . $this->dataNascimento . "', 
            email='" . $this->email . "'

            WHERE idusuario=" . $this->id; // A consulta SQL atualiza os valores dos atributos da classe na tabela "usuario" onde o ID do usuário é igual ao ID armazenado na classe

        // Executa a consulta SQL e verifica se a atualização foi bem-sucedida
        if ($conn->query($sql) === TRUE) { // Se a consulta for bem-sucedida
            $conn->close(); // Fecha a conexão com o banco de dados
            return TRUE; // Retorna verdadeiro se a atualização for bem-sucedida
        } else { // Se a consulta falhar
            $conn->close(); // Fecha a conexão com o banco de dados
            return FALSE; // Retorna falso se a atualização falhar
        }
    }

    public function gerarlista()
    {
        require_once 'ConexaoBD.php'; // inclusão da classe de conexão ConexaoBD
        $con = new ConexaoBD(); // Cria uma nova instância da classe ConexaoBD
        $conn = $con->conectar(); // Chama o método conectar() para obter a conexão com o banco de dados

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) { // Verifica se houve erro na conexão
            die("Connection failed: " . $conn->connect_error); // Se houver erro, exibe a mensagem de erro e encerra o script
        }
        $sql = "SELECT idusuario, nome FROM usuario;"; // Consulta SQL para selecionar todos os dados da tabela "usuario"
        $re = $conn->query($sql); // Executa a consulta SQL e armazena o resultado na variável $re
        $conn->close(); // Fecha a conexão com o banco de dados
        return $re; // Retorna o resultado da consulta SQL
    }
    //método carregarporID
    public function carregarPorId($id)
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuario WHERE idusuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $this->setID($row['idusuario']);
            $this->setNome($row['nome']);
            $this->setCpf($row['cpf']);
            $this->setEmail($row['email']);
            $this->setDataNascimento($row['dataNascimento']);
            // Adicione outros campos conforme existirem no banco
            $stmt->close();
            $conn->close();
            return true;
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    }


    public function listarTodos()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        $usuarios = [];

        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $usuario = new Usuario();
                $usuario->setID($row['idusuario']);
                $usuario->setNome($row['nome']);
                $usuario->setCpf($row['cpf']);
                $usuario->setEmail($row['email']);
                // Adicione outros campos conforme necessário
                $usuarios[] = $usuario;
            }
        }
        $conn->close();
        return $usuarios;
    }
    //metodo getformacoes
    public function getFormacoes()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        $formacoes = [];
        $sql = "SELECT inicio, fim, descricao FROM formacaoacademica WHERE idusuario = ?";
        $stmt = $conn->prepare($sql);
        $id = $this->getID();
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $formacoes[] = $row;
        }
        $stmt->close();
        $conn->close();
        return $formacoes;
    }
    //metodo get experiencias
    public function getExperiencias()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        $experiencias = [];
        $sql = "SELECT inicio, fim, empresa, descricao FROM experienciaprofissional WHERE idusuario = ?";
        $stmt = $conn->prepare($sql);
        $id = $this->getID();
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $experiencias[] = $row;
        }
        $stmt->close();
        $conn->close();
        return $experiencias;
    }
    //metodo get outras formacoes
    public function getOFormacoes()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        $experiencias = [];
        $sql = "SELECT inicio, fim, descricao FROM outrasformacoes WHERE idusuario = ?";
        $stmt = $conn->prepare($sql);
        $id = $this->getID();
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $oformacoes[] = $row;
        }
        $stmt->close();
        $conn->close();
        return $oformacoes;
    }
}
