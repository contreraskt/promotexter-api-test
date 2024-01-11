<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase; // Refresh the database before each test

    /** @test */
    public function it_can_get_all_items()
    {
        // Arrange
        Item::factory(3)->create(); // Create 3 items in the database

        // Act
        $response = $this->json('GET', '/api/items');

        // Assert
        $data = json_decode($response->getContent(), true); // Decode JSON to an array
        $this->assertCount(3, $data); // Check if the response contains an array with 3 items
    }

    /** @test */
    public function it_can_get_a_specific_item()
    {
        // Arrange
        $item = Item::factory()->create(); // Create an item in the database

        // Act
        $response = $this->json('GET', "/api/items/{$item->id}");

        // Assert
        $response->assertStatus(200)
            ->assertJson(['id' => $item->id]); // Check if the response contains the correct item ID
    }

    /** @test */
    public function it_can_create_a_new_item()
    {
        // Arrange
        $data = ['name' => 'New Item'];

        // Act
        $response = $this->json('POST', '/api/items', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data); // Check if the response contains the created item data
    }

    /** @test */
    public function it_can_update_an_existing_item()
    {
        // Arrange
        $item = Item::factory()->create(); // Create an item in the database
        $updatedData = ['name' => 'Updated Item'];

        // Act
        $response = $this->json('PUT', "/api/items/{$item->id}", $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData); // Check if the response contains the updated item data
    }

    /** @test */
    public function it_can_delete_an_item()
    {
        // Arrange
        $item = Item::factory()->create(); // Create an item in the database

        // Act
        $response = $this->json('DELETE', "/api/items/{$item->id}");

        // Assert
        $response->assertStatus(204); // Check if the response has a no content status
        $this->assertDatabaseMissing('items', ['id' => $item->id]); // Check if the item is removed from the database
    }
}