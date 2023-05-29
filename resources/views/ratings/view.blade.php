<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Talenttag: {{ $event->host }} ({{ $event->date->format('d.m.Y') }})
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 text-gray-900">
                <livewire:ratings-table :event="$event"/>
            </div>
        </div>
    </div>
</x-guest-layout>
