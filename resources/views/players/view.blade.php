<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Spielerdetails
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex items-center">
                        <a href="{{ url()->previous() }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-black">
                            Zurück
                        </a>
                        <h3 class="text-lg font-semibold text-gray-700 ml-4">{{ $player->first_name }} {{ $player->last_name }}, {{$player->birthdate->format('d.m.Y') }}
                            ({{ $player->club }})</h3>
                    </div>
                    <div class="mb-4">
                        <table class="w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">E-Mail</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->email }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Geburtsdatum</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->birthdate->format('d.m.Y') }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Telefon</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->phone }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Straße</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->street }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Hausnummer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->housenumber }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Stadt</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->city }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">PLZ</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->zip }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Verein</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->club }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Position</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->position }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Haftungsausschluss
                                    akzeptiert
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $player->accepted_disclaimer ? 'Ja' : 'Nein' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Talenttage</h3>
                        @if($player->events->isNotEmpty())
                            <ul class="list-disc list-inside text-gray-500">
                                @foreach($player->events as $event)
                                    <li><a href="{{ url('/events/' . $event->id) }}">{{ $event->host }}
                                            ({{ $event->date->format('d.m.Y') }})</a></li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">Dieser Spieler hat sich für keine Veranstaltungen registriert.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
