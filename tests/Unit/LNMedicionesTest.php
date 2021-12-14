<?php

namespace Tests\Unit;

use App\Http\LogicasDelNegocio\LNReads;
use Tests\TestCase;

class LNMedicionesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testGuardarMedicion(){

        $LNRead = new LNReads();

        $operationStatus = $LNRead->guardarRead(1,1,1111,1111,'Test read',0);

        $this->assertTrue($operationStatus[0] == 1);


    }
}
