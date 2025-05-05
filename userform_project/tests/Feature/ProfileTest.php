<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_indexed()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertStatus(200)->assertJsonFragment([
            'id' => $product->id
        ]);
    }

    public function test_product_can_be_stored()
    {
        $data = [
            'sku' => 'SKU123',
            'name' => 'New Product',
            'price' => 123.456
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(201)->assertJsonFragment(['name' => 'New Product']);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();

        $response = $this->putJson("/api/products/{$product->id}", [
            'name' => 'Updated Name',
            'price' => 777.000,
        ]);

        $response->assertStatus(200)->assertJsonFragment(['name' => 'Updated Name']);
    }

    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
