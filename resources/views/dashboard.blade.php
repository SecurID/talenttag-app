<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-xl">Talenttage</p>
                    <div class="w-96">
                    @foreach($events as $event)
                            <a
                                href="{{ url('/events/' . $event->id) }}"
                                class="block w-full cursor-pointer rounded-lg bg-primary-100 p-4 border text-primary-600">
                                {{ $event->host }} ({{ $event->date->format('d.m.Y') }})
                            </a>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
