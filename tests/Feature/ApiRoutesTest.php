<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_access_the_test_route()
    {
        $response = $this->get('/api/test');

        $response->assertStatus(200)
                 ->assertJson(['message' => 'API is working!']);
    }

    /** @test */
    public function it_can_register_a_user()
    {
        $response = $this->post('/api/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertStatus(201);
    }

    /** @test */
    public function it_can_login_a_user()
    {
        // First, register a user
        $this->post('/api/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        // Then, attempt to login
        $response = $this->post('/api/login', [
            'email' => 'johndoe@example.com',
            'password' => 'secret',
        ]);

        $response->assertStatus(200);
    }

    // Add more tests for other routes as needed
}