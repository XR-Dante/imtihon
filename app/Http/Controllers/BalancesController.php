<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    public function index()
    {
        $balance = Balance::all();
        return view('home', compact('balance'));
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'balance' => 'required|numeric',
        ]);

        $validated['user_id'] = auth()->id();

        $balance  = Balance::create($validated);


        $id =  $balance->id;


        $transaction = $request->validate([
            'balance' => 'required|numeric',
        ]);

        $transaction['user_id'] = auth()->id();
        $transaction['balance_id'] = $id;
        $transaction['status'] = 'income';


        Transaction::create($transaction);
        return redirect()->route('home')->with('success', 'Balance added successfully');

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $balance = Balance::findOrFail($id);
        return view('edit', compact('balance'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'balance' => 'required',
        ]);

        $balance=Balance::findOrFail($id);
        $balance->update($request->all());
        return redirect()->route('home');
    }

    public function destroy(string $id)
    {
        $balance = Balance::findOrFail($id);
        $balance->delete();

        return redirect()->route('home')->with('success', 'Balance deleted successfully');
    }
}
