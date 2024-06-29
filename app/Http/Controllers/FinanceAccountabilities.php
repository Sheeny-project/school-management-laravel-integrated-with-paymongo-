<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountability;
class FinanceAccountabilities extends Controller
{
    public function index(){
        return view('finance_accountabilities');
    }
    public function getAccountabilities(){
        $row = Accountability::all();
        $response = [];
        foreach ($row as $data){
            $response [] = array(
                'user_id' => $data->join_user->name,
                'accountability' => $data->join_account->name,
                'amount' => $data->amount,
                'status' => '<span class="badge badge-success"> '. $data->join_status->name .'</span>',
            );
        }
        return response()->json($response);
    }
}
