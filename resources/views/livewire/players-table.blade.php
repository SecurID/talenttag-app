<div>
    <div class="mb-4">
        Filter <input type="text" class="w-2/3 border rounded px-2 py-1" placeholder="Suchen..." wire:model="search">
    </div>
    <table class="table-auto w-full text-left">
        <thead class="border-b-2 border-gray-300">
        <tr>
            <th class="px-4 py-2">Vorname</th>
            <th class="px-4 py-2">Nachname</th>
            <th class="px-4 py-2">Geburtsdatum</th>
            <th class="px-4 py-2">Verein</th>
            <th class="px-4 py-2">Nummer</th>
            <th class="px-4 py-2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($players as $player)
            <tr class="border-b border-gray-200">
                <td class="px-4 py-2">{{ $player->first_name }}</td>
                <td class="px-4 py-2">{{ $player->last_name }}</td>
                <td class="px-4 py-2">{{ $player->birthdate->format('d.m.Y') }}</td>
                <td class="px-4 py-2">{{ $player->club }}</td>
                @php
                    $pivot = \App\Models\EventPlayer::where('event_id', '=', $event->id)->where('player_id', '=', $player->id)->first();
                @endphp
                <td class="px-4 py-2">
                    <div x-data="{ saved: false, failed: false }" wire:poll>
                        <input type="number" name="{{ $player->id . 'number' }}" class="border border-gray-200 rounded px-2 py-1"
                               :class="{ 'border-green-500': '{{ $statuses[$player->id] ?? '' }}' === 'saved', 'border-red-500': '{{ $statuses[$player->id] ?? '' }}' === 'failed' }"
                               value="{{ $pivot->number ?? null}}"
                               wire:change="updatePlayer({{ $player->id }}, {{ 1 }}, $event.target.value)">
                    </div>
                </td>
                <td class="px-4 py-2">
                    <a href="{{ url('/players/' . $player->id) }}"
                       class="p-2 rounded-lg bg-black text-white hover:bg-gray-800 transition-colors duration-200">
                        Ansehen
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <script>
            window.addEventListener('status-updated', event => {
                setTimeout(() => {
                    @this.
                    call('resetStatus', event.detail.id);
                }, 2000);
            });
        </script>
    </table>
</div>
