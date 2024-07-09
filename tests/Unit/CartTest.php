<?php

namespace Tests\Unit;

use App\Cart\Cart;
use App\Cart\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    private Cart $cart;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cart = new Cart();
        User::factory()->create();
    }

    public function test_can_add_product_to_cart()
    {
        $product = Product::factory()->create(['price' => 10.00]);
        $this->cart->add($product, 2);

        $this->assertCount(1, $this->cart->content());
        $this->assertEquals(2, $this->cart->count());
        $this->assertEquals(20.00, $this->cart->total());
    }

    public function test_can_remove_product_from_cart()
    {
        $product = Product::factory()->create();
        $this->cart->add($product);

        $this->assertCount(1, $this->cart->content());

        $this->cart->remove($product->id);

        $this->assertCount(0, $this->cart->content());
    }

    public function test_can_clear_cart()
    {
        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();
        $this->cart->add($product1);
        $this->cart->add($product2);

        $this->assertCount(2, $this->cart->content());

        $this->cart->clear();

        $this->assertCount(0, $this->cart->content());
        $this->assertEquals(0, $this->cart->count());
        $this->assertEquals(0, $this->cart->total());
    }

    public function test_can_get_cart_content()
    {
        $product = Product::factory()->create();
        $this->cart->add($product);

        $content = $this->cart->content();

        $this->assertInstanceOf(Collection::class, $content);
        $this->assertCount(1, $content);
        $this->assertInstanceOf(CartItem::class, $content->first());
    }

    public function test_can_calculate_cart_total()
    {
        $product1 = Product::factory()->create(['price' => 10.00]);
        $product2 = Product::factory()->create(['price' => 15.00]);
        $this->cart->add($product1, 2);
        $this->cart->add($product2, 1);

        $this->assertEquals(35.00, $this->cart->total());
    }

    public function test_can_count_cart_items()
    {
        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();
        $this->cart->add($product1, 2);
        $this->cart->add($product2, 3);

        $this->assertEquals(5, $this->cart->count());
    }

    public function test_cart_persists_in_session()
    {
        $product = Product::factory()->create(['price' => 10.00]);
        $this->cart->add($product, 2);

        $newCart = new Cart();

        $this->assertCount(1, $newCart->content());
        $this->assertEquals(2, $newCart->count());
        $this->assertEquals(20.00, $newCart->total());
    }
}