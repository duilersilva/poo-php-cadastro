<?php
if (!isset($_SESSION)) {
    session_start();
}

class ExperienciaProfissionalController
{
    public function inserir($inicio, $fim, $empresa, $descricao, $idusuario)
    {
        require_once '../Model/ExperienciaProf.php';
        $expP = new ExperienciaProf();
        $expP->setInicio($inicio);
        $expP->setFim($fim);
        $expP->setEmpresa($empresa);
        $expP->setDescricao($descricao);
        $expP->setIdUsuario($idusuario);
        $r = $expP->inserirBD();
        return $r;
    }

    public function remover($id)
    {
        require_once '../Model/ExperienciaProf.php';
        $expP = new ExperienciaProf();
        $r = $expP->excluirBD($id);
        return $r;
    }

    public function gerarLista($idusuario)
    {
        require_once '../Model/ExperienciaProf.php';
        $expP = new ExperienciaProf();
        return $results = $expP->listarExperiencias($idusuario);
    }
}
