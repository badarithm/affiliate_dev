<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AffiliateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomeScreenExists()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Home');
        $response->assertSee('Please attach file with affiliate locations');
        $response->assertSee('Submit');
    }
}
