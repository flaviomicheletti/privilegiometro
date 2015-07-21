<?php

require 'funcoes.php';

$posicao_do_usuario = $_GET['id'];

insert($posicao_do_usuario);

$grafico = retGrafico(ret4PrivilegiosRandon(), $posicao_do_usuario);

$estatistica = retEstatistica(retTotalDePesquisas(), retGruposPrivilegios());        

header('Content-Type: application/json');
echo retJsonResultado($grafico, $estatistica); # json_encode()


#
# Resultado
#
//echo retJsonResultado($htmlGrafico, $htmlEstatistica);
//var_dump($_GET);
// $resp = new stdClass();

// $resp->grafico['posicoes']    = [4, 2, 3, 4];
// $resp->grafico['sua_posicao'] = 3;

// $resp->estatistica['total']  = 120;
// $resp->estatistica['grupos'] = [array('total' => 30, 'posicao' => 9), array('total' => 10, 'posicao' => 8)];
// echo json_encode($resp);