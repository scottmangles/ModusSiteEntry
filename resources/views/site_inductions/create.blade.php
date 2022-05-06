<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Site Induction') }}
        </h2>
    </x-slot>
    <div class="mt-3">
        <img  class="mx-auto" src="{{ URL::asset('images/play-thumb.png') }}">
    </div>
    <button type="button" class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Button text</button>
</x-app-layout>
