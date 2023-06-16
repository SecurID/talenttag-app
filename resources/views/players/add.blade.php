<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Talenttag: {{ $event->host }} ({{ $event->date->format('d.m.Y') }})
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 text-gray-900">
                <form method="POST" action="{{ url('/nachmeldung/' . $event->id) }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Vorname</label>
                        <input type="text" name="first_name" id="first_name" autocomplete="given-name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Nachname</label>
                        <input type="text" name="last_name" id="last_name" autocomplete="family-name" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Geburtsdatum</label>
                        <input type="date" name="birthdate" id="birthdate" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-Mail</label>
                        <input type="email" name="email" id="email" autocomplete="email" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefonnummer</label>
                        <input type="tel" name="phone" id="phone" autocomplete="tel" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="street" class="block text-sm font-medium text-gray-700">Straße</label>
                        <input type="text" name="street" id="street" autocomplete="street-address" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="housenumber" class="block text-sm font-medium text-gray-700">Hausnummer</label>
                        <input type="text" name="housenumber" id="housenumber" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Stadt</label>
                        <input type="text" name="city" id="city" autocomplete="address-level2" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="zip" class="block text-sm font-medium text-gray-700">PLZ</label>
                        <input type="text" name="zip" id="zip" autocomplete="postal-code" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="club" class="block text-sm font-medium text-gray-700">Verein</label>
                        <input type="text" name="club" id="club" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="text" name="position" id="position" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="inline-flex">
                        <label for="accepted_disclaimer" class="text-sm font-medium text-gray-700">Datenübertragung akzeptieren</label>
                        <input type="checkbox" name="accepted_disclaimer" id="accepted_disclaimer" required class="mt-1 mx-6 w-auto py-3 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm">
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2">
                            Spieler anlegen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
