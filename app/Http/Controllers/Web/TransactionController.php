<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\TransactionService;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService){
        $this->transactionService = $transactionService;
    }
    public function index(Request $request)
    {
        $data = $this->transactionService->index($request);
        return view('transactions', $data);
    }

    public function create(Request $request)
    {
        $id = $this->transactionService->create($request);
        return view('shopping', compact('id'));
    }

    public function store(Request $request)
    {
        $data = $this->transactionService->store($request);
        return view('check', $data);
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted!');
    }
}
