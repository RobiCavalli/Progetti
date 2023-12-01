<div>
 <!--deve esserci un unico elemento radice -->
    <h1 class="text-center text-red-600 font-bold text-xl mb-4"> Crea un nuovo Cliente</h1>
    <div class="flex justify-center mb-4">
        <form wire:submit.prevent="addCustomer" class="text-black">
            <input type="text" wire:model="name" placeholder="Name">
            <input type="email" wire:model="email" placeholder="Email">
            <button class="ml-2 px-2 py-1 border rounded text-red-600 border-red-600 hover:bg-red-600 hover:text-white" type="submit">Nuovo Cliente</button>
        </form>
    </div>

    <!-- Form per assegnare oggetti ai clienti -->
    <h2 class="text-center text-red-600 font-bold text-xl mb-4"> Associa ad ogni cliente un nuovo oggetto</h2>
    <div class="flex justify-center mb-4">
        <form wire:submit.prevent="assignItem">
            <select wire:model="selectedCustomerId">
                <option value="">Select Cliente</option>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option> <!--DataBlinding di Blade -->
                @endforeach
            </select>

            <input type="text" wire:model="itemType" placeholder="Item Type">
            <input type="text" wire:model="itemPrice" placeholder="Item Price">
            <button class="ml-2 px-2 py-1 border rounded text-red-600 border-red-600 hover:bg-red-600 hover:text-white" type="submit">Assegna Oggetto</button>
        </form>
    </div>

    <!-- clienti & oggetti-->
    <h3 class="text-center text-red-600 font-bold text-xl mb-4">Elenco Clienti e Oggetti in Vendita</h3>
    <div class="mb-20 mt-8">
        <div class="flex justify-center items-center">
            <table class="min-w-full table-auto border-collapse border border-red-600 mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-red-600">Name</th>
                        <th class="px-4 py-2 text-red-600">Email</th>
                        <th class="px-4 py-2 text-red-600">ID Cliente</th>
                        <th class="px-4 py-2 text-red-600">Oggetti in Vendita</th>
                        <th class="px-4 py-2 text-red-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td class="px-4 py-2">{{ $customer->name }}</td>
                        <td class="px-4 py-2">{{ $customer->email }}</td>
                        <td class="px-4 py-2">{{ $customer->id }}</td>
                        <td class="px-4 py-2">{{ $customer->items->count() }}</td>
                        <td class="px-4 py-2">
                            <button class="px-2 py-1 border rounded text-red-600 border-red-600 hover:bg-red-600 hover:text-white" wire:click="deleteCustomer({{ $customer->id }})">Elimina Cliente</button>
                        </td>
                    </tr>
                    @foreach($customer->items as $item)
                    <tr>
                        <td class="px-4 py-2">{{ $item->type }}</td>
                        <td class="px-4 py-2">{{ $item->price }}€</td>
                        <td class="px-4 py-2">{{ $item->status }}</td>
                        <td class="px-4 py-2">{{ $item->id }}</td>
                        <td class="px-4 py-2">
                            <button class="px-2 py-1 border rounded text-red-600 border-red-600 hover:bg-red-600 hover:text-white" wire:click="deleteItem({{ $item->id }})">Elimina Oggetto</button>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

