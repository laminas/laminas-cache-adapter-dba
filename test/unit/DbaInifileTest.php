<?php

namespace LaminasTest\Cache\Storage\Adapter;

use Laminas\Cache\Storage\Adapter\Dba;
use PHPUnit\Framework\TestCase;

/**
 * @group      Laminas_Cache
 * @covers Laminas\Cache\Storage\Adapter\Dba<extended>
 */
class DbaInifileTest extends TestCase
{
    public function testSpecifyingInifileHandlerRaisesException()
    {
        if (! extension_loaded('dba')) {
            $this->markTestSkipped("Missing ext/dba");
        }

        $this->expectException('Laminas\Cache\Exception\ExtensionNotLoadedException');
        $this->expectExceptionMessage('inifile');
        $cache = new Dba([
            'pathname' => sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('laminascache_dba_') . '.inifile',
            'handler'  => 'inifile',
        ]);
    }
}
