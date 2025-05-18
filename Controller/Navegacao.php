<?php
// verifica se a sessao ja foi iniciada
if (!isset($_SESSION)) {
    session_start();
}

switch ($_POST) {
    //caso a variavel seja nula mostra a tela de login

    case (isset($_POST[null])):
        include_once "View/login.php";
        break;
        //acao botao inserir
    case (isset($_POST["btnInfInserir"])):
        include_once "../View/principal.php";
        break;
        //acao botao excluir
    case (isset($_POST["btnInfExcluir"])):
        include_once "../View/principal.php";
        break;
        //acao botao cadastronrealizado
    case (isset($_POST["btnCadNaoRealizado"])):
        include_once "../View/primeiroAcesso.php";
        break;
        //acao botao atualizar usuario
    case (isset($_POST["btnAtualizarUsuario"])):
        include_once "../View/atualizarUsuario.php";
        break;
    //primeiro acesso ao sistema

    case (isset($_POST["btnPrimeiroAcesso"])):
        include_once "../View/primeiroAcesso.php";
        break;

    //cadastrar o usuario
    case (isset($_POST["btnCadastrar"])):
        include_once "../Controller/UsuarioController.php";

        $uController = new UsuarioController();

        if ($uController->inserir(
            $_POST["txtNome"],
            $_POST["txtCPF"],
            $_POST["txtEmail"],
            $_POST["txtSenha"]
        )) {
            include_once "../View/cadastroRealizado.php";
        } else {
            include_once "../View/cadastroNaoRealizado.php";
        }
        break;

    //atualizar o usuario
    case (isset($_POST["btnAtualizar"])):
        require_once "../Controller/UsuarioController.php";

        $uController = new UsuarioController();

        if ($uController->atualizar(
            $_POST["txtID"],
            $_POST["txtNome"],
            $_POST["txtCPF"],
            $_POST["txtEmail"],
            date("Y-m-d", strtotime($_POST["txtData"]))
        )) {
            include_once "../View/atualizacaoRealizada.php";
        } else {
            include_once "../View/atualizacaoNaoRealizada.php";
        }
        break;

    //login do usuario
    case isset($_POST["btnLogin"]):
        include_once "../Controller/UsuarioController.php";

        $uController = new UsuarioController();

        if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
            include_once "../View/principal.php";
        } else {
            include_once "../View/CadastroNaoRealizado.php";
            // echo "<script>alert('Login ou senha incorretos!');</script>";    
        }
        break;

    //adicionar formacao academica

    case (isset($_POST["btnAddFormacao"])):
        require_once "../Controller/FormacaoAcadController.php";
        include_once "../Model/Usuario.php";

        $fController = new FormacaoAcadController();

        if ($fController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioFA"])),
            date("Y-m-d", strtotime($_POST["txtFimFA"])),
            $_POST["txtDescFA"],
            unserialize($_SESSION['Usuario'])->getID()
        ) != false) {
            include_once "../View/informacaoInserida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //excluir formacao academica
    case (isset($_POST["btnExcluirFA"])):
        require_once "../Controller/FormacaoAcadController.php";
        include_once "../Model/Usuario.php";

        $fController = new FormacaoAcadController();

        if ($fController->remover($_POST["id"]) == true) {
            include_once "../View/informacaoExcluida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;


        //adicionar outras formacoes

    case (isset($_POST["btnAddOF"])):
        require_once "../Controller/outrasFormacoesController.php";
        include_once "../Model/Usuario.php";

        $ofController = new OutrasFormacoesController();

        if ($ofController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioOF"])),
            date("Y-m-d", strtotime($_POST["txtFimOF"])),
            $_POST["txtDescOF"],
            unserialize($_SESSION['Usuario'])->getID()
        ) != false) {
            include_once "../View/informacaoInserida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //excluir formacao academica
    case (isset($_POST["btnExcluirOF"])):
        require_once "../Controller/outrasFormacoesController.php";
        include_once "../Model/Usuario.php";

        $ofController = new OutrasFormacoesController();

        if ($ofController->remover($_POST["id"]) == true) {
            include_once "../View/informacaoExcluida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;


    //adicionar experiencia profissional
    case isset($_POST["btnAddEP"]):
        require_once "../Controller/ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";

        $epController = new ExperienciaProfissionalController();

        if ($epController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioEP"])),
            date("Y-m-d", strtotime($_POST["txtFimEP"])),
            $_POST["txtEmpEP"],
            $_POST["txtDescEP"],
            unserialize($_SESSION["Usuario"])->getID()
        ) != false) {
            include_once "../View/informacaoInserida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    //excluir experiencia profissional
    case isset($_POST["btnExcluirEP"]):
        require_once "../Controller/ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";
        $epController = new ExperienciaProfissionalController();
        if ($epController->remover($_POST["id"]) == true) {
            include_once "../View/informacaoExcluida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;
}
?>