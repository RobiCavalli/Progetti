<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class UserController extends Controller
{
    public function index() //legge e mostra un elenco di tutti i record.

    {
        $customers = Customer::all();

    }

    public function store(Request $request)// salva nel db
    {
        Customer::create($request->all());
    }

    public function update(Request $request, Customer $customer) // aggiorna nel db
    {
        $customer->update($request->all());
    }

    public function destroy(Customer $customer)  //elimina
    {
        $customer->delete();

    }
}

