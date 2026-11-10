<?php

namespace App\Livewire\Payments;

use Livewire\Component;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $concept = 'Colegiatura Mensual';
    public $amount = 1500.00;

    public function processPayment()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'concept' => $this->concept,
            'amount' => $this->amount,
            'status' => 'pending',
        ]);

        $session = Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mxn',
                    'product_data' => [
                        'name' => $this->concept,
                    ],
                    'unit_amount' => (int) ($this->amount * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payments.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payments.cancel'),
        ]);

        $payment->update(['stripe_session_id' => $session->id]);

        return redirect()->away($session->url);
    }

    public function render()
    {
        return view('livewire.payments.checkout');
    }
}
