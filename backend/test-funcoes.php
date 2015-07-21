<?php
require 'funcoes.php';

class FooTest extends PHPUnit_Framework_TestCase
{
    public function testretJsonResultado()
    {

        $posicoes_rando = array(-12, -6, 0, 11);
        $sua_posicao    = 22;        
        $grafico        = retGrafico($posicoes_rando, $sua_posicao);
        
        $total       = 5;
        $grupos      = array(["total" => 3, "posicao" => 9 ], ["total" => 2, "posicao" => 8]);
        $estatistica = retEstatistica($total, $grupos);

        $this->assertJsonStringEqualsJsonString(retJsonResultado($grafico, $estatistica),
            json_encode(
                array(
                    "grafico"     => array(
                        'posicoes' => [3, 20, 38, 69],
                        'sua_posicao' => 100
                    ),
                    "estatistica" => array(
                        "total" => 5, 
                        "grupos" => array(["total" => 3, "posicao" => 9 ], ["total" => 2, "posicao" => 8])
                    )
                )
            )
        );
    }

    public function testRetEstatistica()
    {
        $e = array(
            "total"  => 120,
            "grupos" => array(["total" => 30, "posicao" => 9 ], ["total" => 10, "posicao" => 8])
        );
        
        // os dados abaixo originan-se no DB
        $total  = 120;
        $grupos = array(["total" => 30, "posicao" => 9 ], ["total" => 10, "posicao" => 8]);

        $this->assertEquals($e, retEstatistica($total, $grupos));
    }

    public function testRetGrafico()
    {
        $posicoes_rando = array(-12, -6, 0, 11);
        $sua_posicao    = 22;
        
        $atual    = retGrafico($posicoes_rando, $sua_posicao);
        $experado = array(
            'posicoes' => array(3, 20, 38, 69),
            'sua_posicao' => 100
        );

        $this->assertEquals($experado, $atual);
    }

    public function testCalcularPosicoesRelativas()
    {

        $graficoAtual    = calcularPosicoesRelativas(array(-12, -6, 0, 11, 22));
        $graficoEsperado = array(3, 20, 38, 69, 100);

        $this->assertEquals($graficoEsperado, $graficoAtual);
    }

    public function testRetPosicaoRelativaParaGrafico()
    {
        # -12 é a posição minima e seu valor no gráfico é igual a 3%
        $this->assertEquals(3, retPosicaoRelativaParaGrafico(-12));

        # 22 é a posição máxima e seu valor no gráfico é igual a 100%
        $this->assertEquals(100, retPosicaoRelativaParaGrafico(22));
    }

}