<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountability;
use Curl;
class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $amount = is_numeric(request('amount')) ? (int) (request('amount') * 100) : 0;
        $data =
        [
            'data' =>
            [
                'attributes' =>
                [
                        'line_items' => [
                        [
                            'currency' => 'PHP',
                            'amount' => $amount,
                            'description' => $request->description,
                            'name' => $request->name,
                            'quantity' => 1,
                        ]
                ],
                                'payment_method_types'=> [
                                    'gcash','paymaya','card'
                                ],
                                'success_url' => route('payment.success'),
                                'cancel_url' => route('payment.failed'),
                ]
            ]
        ];
        \Session::put('amount', $request->amount);
        \Session::put('id', $request->id);
        \Session::put('description', $request->description);
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
                    ->withHeader('Content-Type', 'application/json')
                    ->withHeader('accept', 'application/json')
                    ->withHeader('Authorization: Basic ' .env('AUTH_PAY'))
                    ->withData($data)
                    ->asJson()
                    ->post();
                    // dd($response);
                    \Session::put('session_id', $response->data->id);
                    return redirect()->to($response->data->attributes->checkout_url);


    }
}
