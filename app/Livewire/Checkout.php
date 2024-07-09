<?php

namespace App\Livewire;

use App\Cart\Facade\Cart;
use App\Services\CheckoutService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Checkout extends Component
{

    #[Validate('required', 'email')]
    public string $email = '';
    #[Validate('required')]
    public string $country = '';
    private readonly CheckoutService $service;

    public function boot(CheckoutService $service): void
    {
        $this->service = $service;
    }

    public function mount(): void
    {
        $this->email = auth()->user()->email ?? '';
    }

    public function removeItem(int $id): void
    {
        Cart::remove($id);
    }

    public function process()
    {
        $this->validate();

        $data = [
            'customer_email' => $this->email,
            'customer_country' => $this->country
        ];

        try {
            $order = $this->service->process($data);
        } catch (\Exception $e) {
            $this->addError('checkout', 'An error occurred while processing the order, please try again later.');

            return $this->render();
        }

        return to_route('checkout.success', ['order' => $order])
            ->with('success', 'Order processed successfully.');
    }

    public function render(): View
    {
        return view('livewire.checkout', [
            'content' => Cart::content(),
            'total' => Cart::total(),
            'countries' => $this->service->getCountries()
        ]);
    }
}
