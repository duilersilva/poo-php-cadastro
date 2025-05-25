<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Visualizar Cadastro</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    include_once '../Model/Usuario.php';
    include_once '../Controller/UsuarioController.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new UsuarioController();
        $usuario = $controller->buscarPorId($id); // agora usa o novo método
    }


    if ($usuario) {
        echo '<div class="w3-container w3-padding-64 w3-light-grey">';
        echo '<h2 class="w3-center w3-text-blue">Detalhes do Usuário</h2>';
        echo '<div class="w3-card-4 w3-white w3-padding w3-round-large" style="width:50%;margin:auto;">';
        echo '<p><strong>ID:</strong> ' . $usuario->getID($id) . '</p>';
        echo '<p><strong>Nome:</strong> ' . $usuario->getNome() . '</p>';
        // Adicione mais campos conforme necessário
        echo '<form action="ADMListarCadastrados.php" method="get">';
        echo '<button class="w3-button w3-blue w3-round-large" type="submit">Voltar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p class="w3-text-red w3-center">Usuário não encontrado!</p>';
    }
    ?>

</body>

</html>