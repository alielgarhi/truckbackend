<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user registration.
     */
    public function test_user_can_register()
    {
        $response = $this->postJson('api/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone_number' => '1234567890',
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['token', 'user']);
        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
    }

    /**
     * Test registration with invalid data.
     */
    public function test_registration_fails_with_invalid_data()
    {
        $response = $this->postJson('/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => 'short',
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure(['errors']);
    }

    /**
     * Test user login.
     */
    public function test_user_can_login()
    {
        $user = User::factory()->create(['password' => bcrypt('password')]);

        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token', 'user']);
    }

    /**
     * Test login with invalid credentials.
     */
    public function test_login_fails_with_invalid_credentials()
    {
        $user = User::factory()->create(['password' => bcrypt('password')]);

        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson(['error' => 'Unauthorized']);
    }

    /**
     * Test retrieving authenticated user details.
     */
    public function test_get_authenticated_user()
    {
        $user = User::factory()->create();
        $token = $user->createToken('UserToken')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->getJson('/user');

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'user']);
        $response->assertJsonFragment(['email' => $user->email]);
    }

    /**
     * Test unauthenticated user cannot retrieve details.
     */
    public function test_unauthenticated_user_cannot_retrieve_details()
    {
        $response = $this->getJson('/user');

        $response->assertStatus(401);
        $response->assertJson(['message' => 'User not authenticated.']);
    }
}
