<x-app-layout>

    <x-slot name="t">
        Kezdőoldal
    </x-slot>

    <!-- Header -->
    <x-slot name="header">
        <h2>Üdvözöllek!</h2>
    </x-slot>

    <!-- Background image -->
    <x-slot name="bg">
        url('assets/img/welcome.jpg')
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Üdvözöllek a KönyvMoly oldalán!<br><br> A jobb felső sarokban található menü segítségével tudsz navigálni az oldalon.<br> A menüpontok leírását a menüpontok alatt találod.<br><br> Jó böngészést!
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
