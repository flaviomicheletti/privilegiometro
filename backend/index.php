<?php

require 'banco.php';
require 'funcoes.php';

$posicao_do_usuario = $_GET['id'];

insert($posicao_do_usuario);

$grafico = retGrafico(ret4PrivilegiosRandon(), $posicao_do_usuario);

$estatistica = retEstatistica(retTotalDePesquisas(), retGruposPrivilegios());        

header('Content-Type: application/json');
echo retJsonResultado($grafico, $estatistica); # json_encode()