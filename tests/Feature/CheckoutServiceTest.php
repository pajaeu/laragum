<?php

namespace Tests\Feature;

use App\Cart\Facade\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\CheckoutService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutServiceTest extends TestCase
{
    use RefreshDatabase;

    private CheckoutService $checkoutService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->checkoutService = new CheckoutService();
    }

    public function test_can_get_countries()
    {
        $countries = $this->checkoutService->getCountries();

        $this->assertIsArray($countries);
        $this->assertNotEmpty($countries);
    }

    public function test_can_process_checkout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product1 = Product::factory()->create(['price' => 10.00]);
        $product2 = Product::factory()->create(['price' => 15.00]);

        Cart::add($product1, 2);
        Cart::add($product2, 1);

        $checkoutData = [
            'customer_email' => 'test@example.com',
            'customer_country' => 'US',
        ];

        $order = $this->checkoutService->process($checkoutData);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals($user->id, $order->user_id);
        $this->assertEquals('test@example.com', $order->customer_email);
        $this->assertEquals('US', $order->customer_country);
        $this->assertNotNull($order->key);

        $this->assertCount(2, $order->items);

        $this->assertEquals(35.00, $order->items->sum('total'));

        $this->assertTrue(Cart::content()->isEmpty());

        $this->assertEquals($order->key, session('order_key'));
    }

    public function test_cant_process_checkout_without_products()
    {
        $checkoutData = [
            'customer_email' => 'test@example.com',
            'customer_country' => 'US',
        ];

        $this->expectException(\Exception::class);

        $this->checkoutService->process($checkoutData);
    }

    public function test_process_checkout_without_user()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['price' => 10.00]);
        Cart::add($product, 1);

        $checkoutData = [
            'customer_email' => 'guest@example.com',
            'customer_country' => 'CA',
        ];

        $order = $this->checkoutService->process($checkoutData);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertNull($order->user_id);
        $this->assertEquals('guest@example.com', $order->customer_email);
        $this->assertEquals('CA', $order->customer_country);
    }
}