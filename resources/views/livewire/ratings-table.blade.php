<div x-data="{ open: false, playerId: null }">
    <div class="mb-4">
        <input type="text" class="w-full border rounded px-2 py-1" placeholder="Nummer suchen..." wire:model="search">
    </div>
    <table class="table-auto w-full text-left">
        <thead class="border-b-2 border-gray-300">
        <tr>
            <th class="hidden bg-gray-100 sm:table-cell">Nummer</th>
            <th class="p-2 w-6 bg-gray-100 sm:hidden">#</th>
            <th class="p-2">Name</th>
            <th class="p-2 w-16">JG</th>
            <th class="p-2 w-8">Verein</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($players as $player)
            @php
                $pivot = \App\Models\EventPlayer::where('event_id', '=', $event->id)->where('player_id', '=', $player->id)->first();
            @endphp
            <tr class="border-b border-gray-200">
                <td class="p-2 bg-gray-100">{{ $pivot->number }}</td>
                <td class="p-2">{{ $player->first_name }} {{ $player->last_name }}</td>
                <td class="p-2">{{ $player->birthdate->format('Y') }}</td>
                <td class="p-2">{{ $player->club }}</td>
                <td><button @click="open = true, playerId = {{ $player->id }}" class="p-2 rounded-lg">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                    </button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Modal Content -->
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <form wire:submit.prevent="storePlayerRecord(playerId)">
                <div class="mb-4">
                    <label for="rating" class="block text-gray-700 text-sm font-bold mb-2">Rating:</label>
                    <select id="rating" wire:model="rating" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select a rating</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Comment:</label>
                    <textarea id="comment" wire:model="comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit
                    </button>
                    <button type="button" @click="open = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
