<?php

if (!isset($_SESSION)) {
    session_start();
}

class UsuarioController
{

    public function inserir($nome, $cpf, $email, $senha)
    {
        require_once "../Model/Usuario.php";
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setCpf($cpf);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $r = $usuario->inserirBD();
        $_SESSION['Usuario'] = serialize($usuario);
        return $r;
    }

    public function atualizar($id, $nome, $cpf, $email, $dataNascimento)
    {
        require_once "../Model/Usuario.php";
        $usuario = new Usuario();
        $usuario->setID($id);
        $usuario->setNome($nome);
        $usuario->setCpf($cpf);
        $usuario->setEmail($email);
        $usuario->setDataNascimento($dataNascimento);

        $r = $usuario->atualizarBD();
        $_SESSION['Usuario'] = serialize($usuario);
        return $r;
    }

    public function login($cpf, $senha)
    {
        require_once "../Model/Usuario.php";
        $usuario = new Usuario();
        $usuario->carregarUsuario($cpf);
        $varSenha = $usuario->getSenha();
        if ($varSenha == $senha) {
            $_SESSION['Usuario'] = serialize($usuario);
            return true;
        } else {
            return false;
        }
    }
}
?>