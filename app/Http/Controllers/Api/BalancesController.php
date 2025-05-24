<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    public function index()
    {
        $balance = Balance::query()->where('user_id', auth()->id())->get();
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
        $balance = Balance::find($id);


        $request->validate([
            'balance' => 'required',
        ]);

        $balance->balance += $request->balance;
        $balance->save();

        return redirect()->route('home');
    }

    public function destroy(string $id)
    {
        $balance = Balance::query()->findOrFail($id);
        $balance->delete();

        return redirect()->route('home')->with('success', 'Balance deleted successfully');
    }
}
