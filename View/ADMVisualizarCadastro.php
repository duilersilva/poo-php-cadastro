
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Usuário</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .info-label { background: #00BCD4; color: #fff; padding: 8px; border-radius: 5px; margin-bottom: 8px; }
        .section-title { background: #00BCD4; color: #fff; padding: 8px; border-radius: 5px; margin-top: 24px; }
    </style>
</head>
<body>
<?php
include_once '../Controller/UsuarioController.php';

if (!isset($_SESSION)) { session_start(); }

$usuario = null;
if (isset($_GET['id'])) {
    $controller = new UsuarioController();
    $usuario = $controller->buscarPorId($_GET['id']);
}

if ($usuario && $usuario->getID()) {
    echo '<div class="w3-container w3-padding-16">';
    echo '<h2 class="w3-center section-title">Paulo Currículo</h2>'; // Ou use $usuario->getNome()
    echo '<div class="w3-container" style="max-width:600px;margin:auto;">';
    echo '<div class="info-label">NOME: ' . $usuario->getNome() . '</div>';
    echo '<div class="info-label">CPF: ' . $usuario->getCpf() . '</div>';
    echo '<div class="info-label">EMAIL: ' . $usuario->getEmail() . '</div>';
    echo '<div class="info-label">DATA DE NASCIMENTO: ' . $usuario->getDataNascimento() . '</div>';
    echo '</div>';

    // Formação Acadêmica (exemplo estático, substitua por dados reais do banco)
    echo '<div class="w3-container" style="max-width:600px;margin:auto;">';
    echo '<h3 class="section-title">Formação Acadêmica</h3>';
    echo '<table class="w3-table-all">';
    echo '<tr class="w3-blue"><th>Início</th><th>Fim</th><th>Descrição</th></tr>';
    // Exemplo de linhas (substitua por foreach dos dados reais)
    echo '<tr><td>1990-01-01</td><td>1991-01-01</td><td>Curso X</td></tr>';
    echo '</table>';

    // Experiência Profissional (exemplo estático, substitua por dados reais do banco)
    echo '<h3 class="section-title">Experiência Profissional</h3>';
    echo '<table class="w3-table-all">';
    echo '<tr class="w3-blue"><th>Início</th><th>Fim</th><th>Empresa</th><th>Descrição</th></tr>';
    echo '<tr><td>1990-01-01</td><td>1991-01-01</td><td>Empresa Y</td><td>Descrição</td></tr>';
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