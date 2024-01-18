<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    public function test_create(): void
    {
        $data = [
            'nome' => 'Jocelim',
            'ref' => '123456789',
            'depInicial' => 100.00,
            'tipo' => 1
        ];
        $response = $this->post('/api/cliente', $data);

        var_dump($response->getContent());

        $response->assertStatus(200);
    }
}
