<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinanceEventModel;
use Illuminate\Support\Facades\Validator;

class FinanceEvent extends Controller
{
    public function index(){
        return view('finance_events');
    }
    public function insertEvent(Request $request)
{
    // Define validation rules
    $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'date' => 'required|date|after_or_equal:today',
    ];

    // Define custom validation messages (optional)
    $messages = [
        'name.required' => 'The event name is required.',
        'description.required' => 'The event description is required.',
        'price.required' => 'The event price is required.',
        'price.numeric' => 'The event price must be a number.',
        'price.min' => 'The event price must be at least 0.',
        'date.required' => 'The event date is required.',
        'date.date' => 'The event date must be a valid date.',
        'date.after_or_equal' => 'The event date must be today or a future date.',
    ];

    // Validate the request
    $validator = Validator::make($request->all(), $rules, $messages);

    // Check if the validation fails
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Proceed with the insert operation if validation passes
    $insert = FinanceEventModel::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'event_date' => $request->date,
        'added_by' => auth()->user()->name
    ]);

    return redirect()->back()->with('success', $request->name . ' successfully added');
}
}
