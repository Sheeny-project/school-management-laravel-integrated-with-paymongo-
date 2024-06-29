<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceDashboard extends Controller
{
    public function index(){
        return view('finance_dashboard');
    }
}
