<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_order()
    {
        $user = User::factory()->create();
        $token = $user->createToken('API Token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->postJson('/orders', [
                             'location' => '123 Main St',
                             'size' => 'Large',
                             'weight' => 100,
                             'pickup_time' => now()->addDay(),
                             'delivery_time' => now()->addDays(2),
                         ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['message', 'order']);
        $this->assertDatabaseHas('orders', ['location' => '123 Main St']);
    }

    public function test_get_all_orders()
    {
        $user = User::factory()->create();
        Order::factory()->count(3)->create(['user_id' => $user->id]);
        $token = $user->createToken('API Token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->get('/orders');

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'orders']);
        $this->assertCount(3, $response->json('orders'));
    }

    public function test_get_specific_order()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $token = $user->createToken('API Token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->get("/orders/{$order->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'order']);
    }

    public function test_update_order()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $token = $user->createToken('API Token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->putJson("/orders/{$order->id}", [
                             'location' => '456 Another St',
                         ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'order']);
        $this->assertDatabaseHas('orders', ['location' => '456 Another St']);
    }

    public function test_delete_order()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $token = $user->createToken('API Token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->deleteJson("/orders/{$order->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }
}
