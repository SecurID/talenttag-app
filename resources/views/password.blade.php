<x-guest-layout>
    <form action="{{ url('/ratings/1') }}">
        <div class="grid grid-cols-2">
            <span>Passwort</span><input type="text" name="password">
        </div>
    </form>
</x-guest-layout>
