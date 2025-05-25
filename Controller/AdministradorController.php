<?php
if (!isset($_SESSION)) {
    session_start();
}

class AdministradorController
{

    public function login($cpf, $senha)
    {
        require_once '../Model/Administrador.php'; // Inclusão do modelo Administrador
        $administrador = new Administrador(); // Criação de um objeto da classe Administrador
        $administrador->carregarAdministrador($cpf); // Carrega os dados do administrador com o CPF fornecido

        if ($administrador->getSenha() == $senha) {
            $_SESSION['Administrador'] = serialize($administrador); // Armazena o objeto Administrador na sessão
            return true; // Retorna verdadeiro se a senha estiver correta
        } else {
            return false; // Retorna falso se a senha estiver incorreta
        }
    }
    public function gerarLista()
    {
        require_once '../Model/Administrador.php';
        $u = new Administrador();
        return $results = $u->listaCadastrados();
    }
}
