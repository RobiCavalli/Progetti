<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $items = Item::create($request->all());
        return response()->json($items);
    }


    public function update(Request $request, Item $item)
    {
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy(Item $item)
    {
        // Elimina tutti i riferimenti nella tabella 'customer_items'
        DB::table('customer_items')->where('item_id', $item->id)->delete();

        // elimina l'item
        $item->delete();

        return response()->json(null, 204);
    }
}
