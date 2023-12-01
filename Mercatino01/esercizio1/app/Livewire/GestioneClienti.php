<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestioneClienti extends Component
{
    public $name, $email;

    public function render()
    {
        return view('livewire.gestione-clienti', [ //vista Blade che verrà renderizzata
            'customers' => Customer::with('items')->get() //carica anche gli oggetti
        ]);
    }

    public function addCustomer() //aggiunta nuovo cliente
    {
        Customer::create([
            'name' => $this->name,
            'email' => $this->email
        ]);

        $this->reset(['name', 'email']); //pulisce i campi del form
    }

    public $selectedCustomerId, $itemType, $itemPrice;

    public function assignItem()
    {
        $customer = Customer::find($this->selectedCustomerId); //cerca record utilizzando id customer
        $customer->items()->create([ //sto assegnando oggetto a customer specifico
            'type' => $this->itemType,
            'price' => $this->itemPrice
        ]);
    }

    //elimina cliente e oggetto
    public function deleteCustomer($customerId)
    { //trova record $customerId e elimina quei record
        DB::table('customer_items')->where('customer_id', $customerId)->delete();
        $customer = Customer::find($customerId);
        $customer->delete(); // Elimina il cliente
    }

    public function deleteItem($itemId)
    {
        DB::table('customer_items')->where('item_id', $itemId)->delete();
        $item = Item::find($itemId);
        $item->delete(); // Elimina l'oggetto
    }


}
