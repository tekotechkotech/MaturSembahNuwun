<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => 10000, // jumlah pembayaran
            ],
            'customer_details' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '08123456789',
            ],
        ];

        // dd($params);

        $snapToken = Snap::getSnapToken($params);
        try {
            $snapToken = Snap::getSnapToken($params);
            return view('payment', ['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function handleNotification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'challenge'
                } else {
                    // TODO Set payment status in merchant's database to 'success'
                }
            }
        } elseif ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'success'
        } elseif ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'pending'
        } elseif ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'failure'
        } elseif ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'failure'
        } elseif ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'failure'
        }
    }
}
