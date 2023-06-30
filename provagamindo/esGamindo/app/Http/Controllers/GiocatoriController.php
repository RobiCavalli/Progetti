<?php

namespace App\Http\Controllers; //modo per incapsulare le classi
use App\Models\Giocatore; // per importare classe giocatore
use Illuminate\Http\Request; //classe per gestire le richiesta HTTP

class GiocatoriController extends Controller
{

    public function index()
    { //  l'elenco completo di giocatori
        $giocatori = Giocatore::all(); // query sul db,stiamo chiamando il metodo statico all() sulla classe Giocatore.
        return response()->json($giocatori); //crea una risposta HTTP con i dati di $giocatori convertiti in JSON

    }

    public function show($id)
    { // per trovare un giocatore specifico
        $giocatori = Giocatore::find($id); //query per trovare un giocatore
        return response()->json($giocatori);
    }

    public function create(Request $request) //prendo oggetto request per accedere ai dati
    {

        $giocatori = new Giocatore(); //nuovo giocatore
        $giocatori->nome = $request->nome;
        $giocatori->email = $request->email;

        $giocatori->save();
        return response()->json("nuovo giocatore creato");
    }

    public function update(Request $request, $id)
    {
        $giocatore = Giocatore::find($id); // trovo giocatore con id e lo aggiorno
        $giocatore->nome = $request->nome;
        $giocatore->email = $request->email;

        $giocatore->save();

        return response()->json($giocatore);
    }

    public function delete($id) // cancello in base a id
    {
        $giocatore = Giocatore::find($id);
        $giocatore->delete();

        return response()->json("Giocatore eliminato");
    }
}
