<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BalanceService extends Controller
{
    public function index()
    {
        return Balance::query()->where('user_id', auth()->id())->get();
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'balance' => 'required|numeric',
        ]);

        $validated['user_id'] = auth()->id();

        $balance  = Balance::query()->create($validated);


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

    public function edit(string $id)
    {
        return Balance::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $balance = Balance::find($id);


        $request->validate([
            'balance' => 'required',
        ]);

        $balance->balance += $request->balance;
        $balance->save();

        return $balance;
    }

    public function destroy(string $id)
    {
        $balance = Balance::query()->findOrFail($id);
        $balance->delete();
        return $balance;
    }
}
