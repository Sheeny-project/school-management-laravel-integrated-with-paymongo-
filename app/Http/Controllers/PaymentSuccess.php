<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountability;

class PaymentSuccess extends Controller
{
    public function index(Request $request){
        $name = \Session::get('id');
        $amount = \Session::get('amount');
        $create = Accountability::create([
            'user_id' => auth()->user()->id,
            'accountability' => $name,
            'amount' => $amount,
            'status' => 1,
        ]);
        return redirect()->route('home')->with('success', $name. ' successfully purchased');
    }
    public function paymentFailed(Request $request){
        $name = \Session::get('name');
        return redirect()->route('home')->with('success', $name. ' purchase failed');
    }
}
