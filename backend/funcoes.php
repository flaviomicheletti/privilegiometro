<?php

#
# Retorna Json ex:
#
# {
# "grafico":
#     {"posicoes": [4,2,3,4],
#     "sua_posicao": 3},
# "estatistica":
#     {
#     "total": 120,
#     "grupos":[
#           {"total": 30, "posicao":9},
#           {"total": 10, "posicao":8}
#         ]
#     }
# }
function retJsonResultado($grafico, $estatistica) {
    return  json_encode(array(
                    "grafico"     => $grafico,
                    "estatistica" => $estatistica
                    )
                );
}

#
# Retorna os dados da estatística
#
function retEstatistica($total, $grupos) {
    return array("total" => $total, "grupos" => $grupos);
}

#
# Retora os dados do gráfico
#
function retGrafico($posicoes, $sua_posicao) {
    # juntar tudo
    array_push($posicoes, $sua_posicao);
    
    # calcular as posições relativas
    $posicoesCalculadas = calcularPosicoesRelativas($posicoes);

    # separar novamente
    $sua_posicao = array_pop($posicoesCalculadas);

    return array('posicoes' => $posicoesCalculadas, 'sua_posicao' => $sua_posicao);
}

#
# Calcular posições relativas
#
function calcularPosicoesRelativas($posicoes) {
    $arr = array();
    foreach ($posicoes as $posicao) {
        $arr[] = retPosicaoRelativaParaGrafico($posicao);
    }
    return $arr;
}

# Retorna posição relativa para o gráfico
#
# Sendo a posição mínima -12 e máxima 22, temos
# 22 + 12 + 1(considero o zero) = 35 posições.
#
# O fator '13' é o resultado de 35 - 22, ex:
#
# -12 -11 -10 -9 ... 20  21  22
#   1   2   3  4     33  34  35
#   3%                      100%
function retPosicaoRelativaParaGrafico($posicao) {
    $posicao_corrigida = $posicao + 13;
    $posicao_relativa  = ceil($posicao_corrigida / 35 * 100);
    return $posicao_relativa;
}