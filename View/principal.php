<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Principal</title>

    <style>
        .w3-sidebar {
            width: 120px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: auto;
        }

        body,
        h1,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }

        h2 {

            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 1.5rem;
            text-align: center;
            color: black;
            font-weight: bold;

        }
    </style>
</head>

<body class="w3-light-grey">

    <?php

    include_once "../Model/Usuario.php";
    include_once "../Controller/FormacaoAcadController.php";
    include_once "../Controller/ExperienciaProfissionalController.php";
    include_once "../Controller/UsuarioController.php";
    include_once "../Controller/outrasFormacoesController.php";

    if (!isset($_SESSION)) {
        session_start();
    }

    ?>

    <nav class="w3-sidebar w3-bar-block w3-center w3-blue ">
        <a href="#home"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>

        <a href="#dPessoais"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-address-book w3-xxlarge"></i>
            <p>Dados Pessoais</p>
        </a>

        <a href="#formacao"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-mortar-board w3-xxlarge"></i>
            <p>Formação</p>
        </a>

        <a href="#outraFormacao"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-chalkboard-teacher w3-xxlarge"></i>
            <p>Outras Formações</p>
        </a>

        <a href="#eProfissional"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
            <i class="fa fa-briefcase w3-xxlarge"></i>
            <p>Experiência Profissional</p>
        </a>
    </nav>




    <div class="w3-padding-large" id="main">
        <header class="w3-container w3-padding-32 w3-center " id="home">
            <h1>
                <img src="../Img/img_teste.png" alt="Logo" class="w3-image" width="25%">
                </br>
            </h1>
            <br>
            <h1 class="w3-text-cyan">SISTEMA DE CURRICULOS</h1>
        </header>
    </div>

    <!--dados pessoais-->
    <div class="w3-padding-128 w3-content w3-text-grey w3-border w3-border-blue w3-padding" id="dPessoais">
        <h2>Dados Pessoais</h2>


        <form action="/Controller/Navegacao.php" method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width:auto;">
            <input class="w3-input w3-border w3-round-large"
                value="<?php echo unserialize($_SESSION['Usuario'])->getID(); ?>"
                name="txtID"
                type="hidden">
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-user"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large"
                        value="<?php echo unserialize($_SESSION['Usuario'])->getNome(); ?>"
                        name="txtNome"
                        type="text"
                        placeholder="Nome Completo">
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-calendar"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large"
                        value="<?php echo unserialize($_SESSION['Usuario'])->getDataNascimento(); ?>"
                        name="txtData"
                        type="date"
                        placeholder="Data de Nascimento">
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-drivers-license"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large"
                        value="<?php echo unserialize($_SESSION['Usuario'])->getCpf(); ?>"
                        name="txtCPF"
                        type="text"
                        placeholder="CPF (ex.:11111111111)">
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-envelope"></i>
                </div>
                <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large"
                        value="<?php echo unserialize($_SESSION['Usuario'])->getEmail(); ?>"
                        name="txtEmail"
                        type="text"
                        placeholder="Email">

                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-center" style="width: auto;">
                    <button
                        class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large"
                        name="btnAtualizar"
                        style="width: auto;"> Atualizar </button>
                </div>
            </div>

        </form>

    </div><br>

    <!--formação acadêmica-->
    <div class="w3-padding-128 w3-content w3-text-grey w3-border w3-border-blue w3-padding" id="formacao">
        <h2>Formação Acadêmica</h2>

        <form action="/Controller/Navegacao.php" method="post" class=" w3-row w3-light-grey w3-text-blue w3-margin" style="width:auto;">
            <div class="w3-row w3-center">
                <div class="w3-col" style="width:50%;">
                    Data Inicial
                </div>
                <div class="w3-res" style="width:100%;">
                    Data Final
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-row w3-section w3-col" style="width:45%;">
                    <div class="w3-col" style="width:15%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">

                        <input class="w3-input w3-border w3-round-large"
                            name="txtInicioFA" type="date">
                    </div>
                </div>

                <div class="w3-row w3-section w3-rest" style="width:auto; ">
                    <div class="w3-col w3-margin-left" style="width:13%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtFimFA" type="date" placeholder="">
                    </div>
                </div>

                <div>
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtDescFA" type="text"
                                placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza">
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-center w3-round-large" style="width: auto;">
                            <button name="btnAddFormacao" class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large"
                                style="width: auto">
                                <i class="w3-xxlarge fa fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

        </form>
        <div class="w3-container">
            <table class="w3-table-all w3-centered">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Descrição</th>
                        <th>Apagar</th>
                    </tr>

                    <?php
                    $fCon = new FormacaoAcadController();
                    $results = $fCon->gerarlista(unserialize($_SESSION['Usuario'])->getID());

                    if ($results != null)

                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo "<td style='width: 10%;'>" . $row->inicio . "</td>";
                            echo "<td style='width: 10%;'>" . $row->fim . "</td>";
                            echo "<td style='width: 50%;'>" . $row->descricao . "</td>";
                            echo '<td style="width: 5%;">
                        
                        <form action="/Controller/Navegacao.php" method="post">
                            <input type="hidden" name="id" value="' . $row->idformacaoAcademica . '">
                                <button name="btnExcluirFA" class="w3-button w3-block w3-blue w3-cell w3-round-large">
                                    <i class="fa fa-user-times"></i> 
                                    </button>
                        </form>
                        </td>';
                        }
                    ?>
                </thead>
            </table>
        </div>
    </div>
    </div>
    <br>

    <!-- outras formações-->


    <div class="w3-padding-128 w3-content w3-text-grey w3-border w3-border-blue w3-padding" id="outraFormacao">
        <h2>Outras Formações</h2>

        <form action="/Controller/Navegacao.php" method="post" class="w3-row w3-light-grey w3-text-blue w3-margin"
            style="width: auto;">
            <div class="w3-row w3-center">
                <div class="w3-col" style="width:50%;">
                    Data Inicial
                </div>
                <div class="w3-col" style="width:50%;">
                    Data Final
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-row w3-section w3-col" style="width:45%;">
                    <div class="w3-col" style="width:15%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large"
                            name="txtInicioOF" type="date">
                    </div>
                </div>
                <div class="w3-row w3-section w3-rest" style="width:auto;">
                    <div class="w3-col w3-margin-left" style="width:13%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>

                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtFimOF"
                            type="date">
                    </div>
                </div>

                <div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtDescOF"
                                type="text" placeholder="Ex.: curso de Inglês - Escola de Idiomas">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-center w3-round-large" style="width:auto;">
                            <button name="btnAddOF" class="w3-button w3-block w3-blue w3-cell w3-round-large w3-margin"
                                style="width: auto;">
                                <i class="w3-xxlarge fa fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
        </form>

        <div class="w3-container">
            <table class="w3-table-all w3-centered">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Descrição</th>
                        <th>Apagar</th>
                    </tr>

                    <?php
                    $ofCon = new OutrasFormacoesController();
                    $results = $ofCon->gerarlista(unserialize($_SESSION['Usuario'])->getID());

                    if ($results != null)

                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo "<td style='width: 10%;'>" . $row->inicio . "</td>";
                            echo "<td style='width: 10%;'>" . $row->fim . "</td>";
                            echo "<td style='width: 50%;'>" . $row->descricao . "</td>";
                            echo '<td style="width: 5%;">
                        
                        <form action="/Controller/Navegacao.php" method="post">
                            <input type="hidden" name="id" value="' . $row->idoutrasformacoes . '">
                                <button name="btnExcluirOF" class="w3-button w3-block w3-blue w3-cell w3-round-large">
                                    <i class="fa fa-user-times"></i> 
                                    </button>
                        </form>
                        </td>';
                        }
                    ?>

                </thead>
            </table>
        </div>
    </div>
    </div>
    </div>

    <br>

    <!--experiencia profissional-->
    <div class="w3-padding-128 w3-content w3-text-grey w3-border w3-border-blue w3-padding" id="eProfissional">
        <h2>Experiência Profissional</h2>

        <form action="" method="post" class="w3-row w3-light-grey w3-text-blue w3-margin"
            style="width: auto;">
            <div class="w3-row w3-center">
                <div class="w3-col" style="width:50%;">
                    Data Inicial
                </div>
                <div class="w3-res" style="width:100%;">
                    Data Final
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-row w3-section w3-col" style="width:45%;">
                    <div class="w3-col" style="width:15%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large"
                            name="txtInicioEP" type="date">
                    </div>
                </div>
                <div class="w3-row w3-section w3-rest" style="width:auto;">
                    <div class="w3-col w3-margin-left" style="width:13%;">
                        <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>

                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtFimEP"
                            type="date">
                    </div>
                </div>

                <div>
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtEmpEP"
                                type="text" placeholder="Empresa: Ex.: Centro Paula Souza">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:7%;">
                            <i class="w3-xxlarge fa fa-align-justify"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtDescEP"
                                type="text" placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Páginas WEB">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-center w3-round-large" style="width:auto;">
                            <button name="btnAddEP" class="w3-button w3-block w3-blue w3-cell w3-round-large w3-margin"
                                style="width: auto;">
                                <i class="w3-xxlarge fa fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
        </form>
        <div class="w3-container">
            <table class="w3-table-all w3-centered">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Empresa</th>
                        <th>Descrição</th>
                        <th>Apagar</th>
                    </tr>

                    <?php
                    $ePro = new ExperienciaProfissionalController();
                    $results = $ePro->gerarLista(unserialize($_SESSION['Usuario'])->getID());

                    if ($results != null)
                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 10%;">' . $row->inicio . '</td>';
                            echo '<td style="width: 10%;">' . $row->fim . '</td>';
                            echo '<td style="width: 10%;">' . $row->empresa . '</td>';
                            echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                            echo '<td style="width: 5%;"> 
                    <form action="/Controller/Navegacao.php" method="post"> 
                    <input type="hidden" name="id" value="' . $row->idexperienciaprofissional . '"> 
                    <button name="btnExcluirEP" class="w3-button w3-block w3-blue w3-cell w3-round-large">
                     <i class="fa fa-user-times"></i> </button></td>
                      </form>';
                            echo '</tr>';
                        }
                    ?>
                </thead>

            </table>
        </div>
    </div>
    </div>




    <br>











</body>

</html>