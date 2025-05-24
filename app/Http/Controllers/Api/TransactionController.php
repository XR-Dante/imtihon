<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $id      = $request->query('balance_id');
        $status  = $request->query('status');

        if($status && $status !== 'all'){

            $transactions = Transaction::query()
                ->where('user_id', auth()->id())
                ->where(DB::raw('LOWER(status)'), strtolower($status))->get();

        }else {

            $transactions = Transaction::query()->where('user_id', auth()->id())->get();

        }
        return view('transactions', compact('transactions',  'status'));
    }

    public function create(Request $request)
    {

        $id = $request->query('balance_id');
        return view('shopping', compact('id'));
    }

    public function store(Request $request)
    {
        $id = $request->get('balance_id');
        $validated = $request->validate([
            'balance_id' => 'required|exists:balances,id',
            'name' => 'required|string',
            'status' => 'required|in:income,expense',
            'description' => 'required|string',
            'balance' => 'required|numeric|min:0.1',
            'date' => 'required|date',
        ]);
        $validated['user_id'] = auth()->id();

        $balance = Balance::find($id);


        if($balance->balance <= $request->get('balance')){
            return "Hisobda mablag' yetarli emas";
        }

        $balance->balance -= $request->balance;
        $balance->save();

        $transaction = Transaction::create($validated);


        return view('check', compact('transaction', 'balance'));
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
    }

    public function update(Request $request, Transaction $transaction)
    {

    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted!');
    }
}
