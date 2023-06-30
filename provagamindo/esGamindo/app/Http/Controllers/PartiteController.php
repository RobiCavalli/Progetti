<?php

namespace App\Http\Controllers; //modo per incapsulare le classi
use App\Models\Partite; // per importare classe partite
use Illuminate\Http\Request; //classe per gestire le richiesta HTTP


class PartiteController extends Controller
{

    public function index()
    {
        $partite = Partite::all();
        return response()->json($partite);
    }

    public function show($id)
    {
        $partite = Partite::find($id);
        return response()->json($partite);
    }

    public function create(Request $request)
    {
        $partite = new Partite();
        $partite-> score= $request->score;
        $partite-> partite_effettuate= $request->partite_effettuate;
        $partite->giocatore_id = $request->giocatore_id;

        $partite->save();
        return response()->json("nuovo partita");

    }

    public function update(Request $request, $id)
    {
        $partite = Partite::find($id);
        $partite-> score= $request->score;
        $partite-> partite_effettuate= $request->partite_effettuate;

        $partite->save();

        return response()->json($partite);
    }

    public function delete($id)
    {
        $partite = Partite::find($id);
        $partite->delete();

        return response()->json("Partita eliminata");
    }
}














