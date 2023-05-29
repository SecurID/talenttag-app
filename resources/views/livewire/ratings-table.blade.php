<div>
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
                <td><a href=""
                       class="p-2 rounded-lg">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                    </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
