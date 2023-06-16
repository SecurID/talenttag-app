<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Talenttag: {{ $event->host }} ({{ $event->date->format('d.m.Y') }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{ url('/players/import/' . $event->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                    @csrf
                    <div class="flex items-center py-2">
                        <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 4a2 2 0 00-2 2v4a2 2 0 104 0V6a2 2 0 00-2-2zm0 12a6 6 0 100-12 6 6 0 000 12z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Select a file</span>
                            <input type='file' class="hidden" name="file" accept=".xlsx" />
                        </label>
                    </div>
                    <input type="submit" class="mt-5 px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-700" value="Importieren"></input>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
