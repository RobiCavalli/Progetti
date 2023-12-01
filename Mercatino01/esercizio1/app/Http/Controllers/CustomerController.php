<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index() //Recupera elenco clienti dal database.
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(Request $request) //Crea un nuovo cliente
    {
        $customer = Customer::create($request->all());
        if ($request->has('item')) {
            $customer->items()->create($request->input('item'));
        }

        return response()->json($customer);
    }


    public function update(Request $request, Customer $customer) //Aggiorna i dettagli del cliente
    {
        $customer->update($request->all());

        if ($request->has('item')) {
            // Trova l'item specifico per l'ID
            $itemId = $request->input('item.id');
            $item = $customer->items()->find($itemId);

            if ($item) {
                // Aggiorna l'item se trovato
                $item->update($request->input('item'));
            }
        }

        return response()->json(['message' => 'Aggiornamento avvenuto con successo']);

    }

    public function destroy(Customer $customer) //elimina
    {
        DB::table('customer_items')->where('customer_id', $customer->id)->delete();

        // Ora puoi eliminare il customer
        $customer->delete();

        return response()->json(null, 204);
    }
}
