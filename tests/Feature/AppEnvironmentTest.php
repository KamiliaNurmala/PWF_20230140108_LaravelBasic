<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAppEnv1(): void
    {
        $this->assertEquals('testing', App::environment());
    }

    public function testAppEnv(): void
    {
        $this->assertTrue(App::environment(['local', 'testing', 'production', 'dev']));
    }
}
