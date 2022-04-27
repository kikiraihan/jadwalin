<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation')

        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </header> --}}

    </x-slot>
    
    <x-slot name="footer">
        @include('layouts.footer')
    </x-slot>
    
    <x-slot name="stylehalaman">
        @livewireStyles
    </x-slot>
    <x-slot name="scripthalaman">
        @livewireScripts
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! Welcome {{auth::user()->username}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
