<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetEnv(): void
    {
        $youtube = env('YOUTUBE');

        self::assertEquals('Programmer Zaman Now', $youtube);
    }

    public function testDefaultEnv(): void
    {
        $author = env('AUTHOR', 'Sneli');

        self::assertEquals('Sneli', $author);
    }
}
