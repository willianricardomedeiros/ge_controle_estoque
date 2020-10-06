<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Str;

use App\Categoria;

use Exception;

use DB;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAplicacaoRodando()
    {
        $response = $this->get('http://localhost:8000');
        $response->assertStatus(200);
    }

}
