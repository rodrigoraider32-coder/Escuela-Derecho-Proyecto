<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if ($sessionId) {
            Stripe::setApiKey(config('services.stripe.secret'));
            $session = Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                Payment::where('stripe_session_id', $sessionId)
                    ->update(['status' => 'completed']);
            }
        }

        return redirect()->route('dashboard')->with('flash.banner', '¡Pago procesado con éxito!');
    }

    public function cancel()
    {
        return redirect()->route('dashboard')->with('flash.banner', 'El proceso de pago fue cancelado.');
    }
}
