<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function store(StoreCustomerRequest $request)
    {
       
        $customer = Customer::create($request->all());

        return $customer;
    }
}
