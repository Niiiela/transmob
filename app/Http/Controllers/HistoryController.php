<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $phone = preg_replace('/\D/', '', $request->input('phone', '') );

        $customer = Customer::where('phone', $phone)
                ->with('sent', 'received')
                ->first();

        if(! $customer)
        {
            return redirect()->back()->with('error', 'Cliente não encontrado!');
        }
        return view('history.index', ['customer' => $customer]);
    }
}
