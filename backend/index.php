<?php

#
# Este script recebe a posição do usuário e retorna
# um json com os dados do gráficos e da estatística.
#

require 'banco.php';
require 'funcoes.php';

$posicao_do_usuario = $_GET['id'];

insert($posicao_do_usuario);

# O gráfico é composto por 5 resultados.
# Os 4 primeiros são randômicos e o quinto e último
# é a posição do usuário atual (aquelque acabou de preencher)
#
#  {"grafico":
#     {"posicoes": [4,2,5,4],
#     "sua_posicao": 3}
#  }
$grafico = retGrafico(ret4PrivilegiosRandon(), $posicao_do_usuario);

# A estatística é composta pelo total de pesquisads já realizadas e
# uma lista somando cada grupo.
#
# {"estatistica":
#     {
#     "total": 120,
#     "grupos":[
#           {"total": 30, "posicao":9},
#           {"total": 10, "posicao":8}
#         ]
#     }
# }
$estatistica = retEstatistica(retTotalDePesquisas(), retGruposPrivilegios());

#
# json_encode()
#
header('Content-Type: application/json');
echo retJsonResultado($grafico, $estatistica);