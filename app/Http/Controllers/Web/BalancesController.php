<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\BalanceService;
use App\Http\Controllers\Service\TransactionService;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    protected $balanceService;

    public function __construct(BalanceService $balanceService){
        $this->balanceService = $balanceService;
    }
    public function index()
    {
        $balance =  $this->balanceService->index();
        return view('home', compact('balance'));
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->balanceService->store($request);
        return redirect()->route('home')->with('success', 'Balance added successfully');
    }


    public function edit(string $id)
    {
       $balance = $this->balanceService->edit($id);
        return view('edit', compact('balance'));
    }

    public function update(Request $request, string $id)
    {
        $this->balanceService->update($request, $id);
        return redirect()->route('home');
    }

    public function destroy(string $id)
    {
        $this->balanceService->destroy($id);
        return redirect()->route('home')->with('success', 'Balance deleted successfully');
    }
}
