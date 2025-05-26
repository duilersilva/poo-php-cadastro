<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Visualizar Usuário</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .info-label {
            background: #00BCD4;
            color: #fff;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 8px;
        }

        .section-title {
            background: #00BCD4;
            color: #fff;
            padding: 8px;
            border-radius: 5px;
            margin-top: 24px;
        }
    </style>
</head>

<body>
    <?php
    include_once '../Controller/UsuarioController.php';


    if (!isset($_SESSION)) {
        session_start();
    }

    $usuario = null;
    if (isset($_GET['id'])) {
        $controller = new UsuarioController();
        $usuario = $controller->buscarPorId($_GET['id']);
    }



    if ($usuario && $usuario->getID()) {
        echo '<div class="w3-container" style="max-width:600px;margin:auto;">';
        echo '<h2 class="w3-center section-title">' . htmlspecialchars($usuario->getNome()). '</h2>';
        echo '<div class="w3-container" style="max-width:600px;margin:auto;">';
        echo '<div class="info-label">NOME: ' . htmlspecialchars($usuario->getNome()). '</div>';
        echo '<div class="info-label">CPF: ' . htmlspecialchars($usuario->getCpf()). '</div>';
        echo '<div class="info-label">EMAIL: ' . htmlspecialchars($usuario->getEmail()). '</div>';
        echo '<div class="info-label">DATA DE NASCIMENTO: ' . htmlspecialchars($usuario->getDataNascimento()) . '</div>';
        echo '</div>';

        // Formação Acadêmica
        $formacoes = $usuario->getFormacoes();
        echo '<div class="w3-container" style="max-width:600px;margin:auto;">';
        echo '<h3 class="section-title">Formação Acadêmica</h3>';
        echo '<table class="w3-table-all">';
        echo '<tr class="w3-blue"><th>Início</th><th>Fim</th><th>Descrição</th></tr>';
        if ($formacoes) {
            foreach ($formacoes as $f) {
                echo '<tr><td>' . htmlspecialchars($f['inicio']) . '</td><td>' . htmlspecialchars($f['fim']) . '</td><td>' . htmlspecialchars($f['descricao']) . '</td></tr>';
            }
        } else {
            echo '<tr><td colspan="3" class="w3-center">Nenhuma formação cadastrada.</td></tr>';
        }
        echo '</table>';

        // Outras Formaçoes
        $oformacoes = $usuario->getOFormacoes();
        echo '<div class="w3-container" style="max-width:600px;margin:auto;">';
        echo '<h3 class="section-title">Outras Formações</h3>';
        echo '<table class="w3-table-all">';
        echo '<tr class="w3-blue"><th>Início</th><th>Fim</th><th>Descrição</th></tr>';
        if ($oformacoes) {
            foreach ($oformacoes as $of) {
                echo '<tr><td>' . htmlspecialchars($of['inicio']) . '</td><td>' . htmlspecialchars($of['fim']) . '</td><td>' . htmlspecialchars($of['descricao']) . '</td></tr>';
            }
        } else {
            echo '<tr><td colspan="3" class="w3-center">Nenhuma formação cadastrada.</td></tr>';
        }
        echo '</table>';

        // Experiência Profissional
        echo '<h3 class="section-title">Experiência Profissional</h3>';
        echo '<table class="w3-table-all">';
        echo '<tr class="w3-blue"><th>Início</th><th>Fim</th><th>Empresa</th><th>Descrição</th></tr>';
        $experiencias = $usuario->getExperiencias();
        if ($experiencias) {
            foreach ($experiencias as $e) {
                echo '<tr><td>' . htmlspecialchars($e['inicio']) . '</td><td>' . htmlspecialchars($e['fim']) . '</td><td>' . htmlspecialchars($e['empresa']) . '</td><td>' . htmlspecialchars($e['descricao']) . '</td></tr>';
            }
        } else {
            echo '<tr><td colspan="4" class="w3-center">Nenhuma experiência cadastrada.</td></tr>';
        }
        echo '</table>';
        echo '</div>';

        echo '<div class="w3-center w3-margin-top">';
        echo '<a href="ADMListarCadastrados.php" class="w3-button w3-blue w3-round-large">Voltar</a>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="w3-container w3-center w3-padding-64">';
        echo '<h3 class="w3-text-red">Usuário não encontrado!</h3>';
        echo '<a href="ADMListarCadastrados.php" class="w3-button w3-blue w3-round-large">Voltar</a>';
        echo '</div>';
    }
    ?>
</body>

</html>