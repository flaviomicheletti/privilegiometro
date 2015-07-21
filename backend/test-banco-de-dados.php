<?php
require 'banco.php';

class DataBaseTest extends PHPUnit_Framework_TestCase
{
    protected static $dbh;

    public static function setUpBeforeClass()
    {
        self::$dbh = getPDO();

        //
        // Vai apagar os dados de sua tabela !!!
        //
        self::$dbh->exec("TRUNCATE privilegios;");
        insert($posicao=10);
        insert($posicao=11);
        insert($posicao=12);
        insert($posicao=13);
    }

    public static function tearDownAfterClass()
    {
        self::$dbh->exec("TRUNCATE privilegios;");
        self::$dbh = NULL;
    }

    public function testRet4PrivilegiosRandon()
    {
        $privilegios = ret4PrivilegiosRandon();
        $this->assertEquals(4, count($privilegios));
    }

    public function testRetTotalDePesquisas()
    {
        $this->assertEquals(4, retTotalDePesquisas());
    }

    public function testRetGrupos()
    {
        $grupos = retGruposPrivilegios();

        $this->assertEquals(4, count($grupos));
        foreach ($grupos as $grupo) {
            $this->assertObjectHasAttribute('total', $grupo);
            $this->assertObjectHasAttribute('posicao', $grupo);
        }
    }


}
