<?php
if (!isset($_SESSION)) {
    session_start();
}

class OutrasFormacoesController
{
    public function inserir($inicio, $fim, $descricao, $idusuario)
    {
        require_once "../Model/OutrasFormacoes.php";
        $oformacao = new OutrasFormacoes();
        $oformacao->setInicio($inicio);
        $oformacao->setFim($fim);
        $oformacao->setDescricao($descricao);
        $oformacao->setIDUsuario($idusuario);

        $r = $oformacao->inserirBD();
        return $r;
    }

    public function remover($id)
    {
        require_once "../Model/OutrasFormacoes.php";
        $oformacao = new OutrasFormacoes();
        $r = $oformacao->excluirBD($id);
        return $r;
    }

    public function gerarlista($idusuario)
    {
        require_once "../Model/OutrasFormacoes.php";
        $oformacao = new OutrasFormacoes();
        return $results = $oformacao->listaroFormacoes($idusuario);
    }
}
