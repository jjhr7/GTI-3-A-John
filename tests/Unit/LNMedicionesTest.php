<?php

namespace Tests\Unit;

use App\User;
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

        /*$user = User::factory()->create();


        $this->actingAs($user)->post('/api/v1/medicione/create', $test_read)->assertSessionHas('status', 'Post has been created sucessfully');*/

        $test_read = [
            'data' => 120,
            'read_date' => '2021-10-17',
            'device_id' => 1,
            'is_draft' => false
        ];
        $response=$this->post('/api/v1/medicion/create',$test_read);
        $response->assertStatus(302);


    }
}
