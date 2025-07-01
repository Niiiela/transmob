<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    
    public function __invoke(Request $request)
    {
        //Receber os parâmento da URL
        $phone = $request->input('phone', '');

        //Busca no banco de dados
        $customer = Customer::where('phone', '$phone')
            ->first();

        if(! $customer) 
        {
            return redirect()->back()->with('error', 'cliente não encontrado.');
        }
       
        return view('history.index', ['customer' => $customer]);
    }
}


       