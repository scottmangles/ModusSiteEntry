<x-app-layout>
    <div class="my-5 ml-5">
    <form class="ml-5 space-y-8 divide-y divide-gray-200"
        method="POST"
        action="{{ route('quizes.store') }}"
        >
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div>
              <h3 class="text-lg font-medium leading-6 text-gray-900">Induction Quiz</h3>
            </div>
            @foreach($questions as $question)
            <div class="mt-6">
                <x-label>{{ $question->question_name }} ?</x-label>
            </div>
            @foreach($question->questionOptions as $option)
            
            <div class="mt-2">
                <div class="mt-4 space-y-4">
                  <div class="flex items-center">
                    <input name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif type="radio" class="w-4 h-4 text-blue-800 border-gray-300 focus:ring-blue-700" required>
                    <label for="push-everything" class="ml-3">
                      <span class="block text-sm font-medium text-gray-700">{{ $option->option_name }}</span>
                    </label>
                  </div>
                </div>
              </div>
              @endforeach

              @endforeach
        <div class="pt-5">
          <div class="flex justify-end">
            <x-button-link-small href="{{ route('dashboard') }}">Cancel</x-button-link-small>
            <x-button-small type="submit" class=ml-3>Save</x-button-small>
          </div>
        </div>
      </form>
    </div>
    </x-app-layout>
