<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Site Induction') }}
        </h2>
    </x-slot>
    <div class="mt-3">
        <img  class="mx-auto" src="{{ URL::asset('images/play-thumb.png') }}">
    </div>
    <div class="flex justify-center">
    <x-button-link-2 class="inline-flex content-center" href="{{ route('quizes.create') }}">Complete Questionnaire</x-button-link-2>
    </div>
</x-app-layout>
