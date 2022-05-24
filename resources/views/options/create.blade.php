<x-app-layout>
    <div class="mx-5 my-5">
    <form class="space-y-8 divide-y divide-gray-200"
        method="POST"
        action="{{ route('options.store') }}"
        >
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div>
              <h3 class="text-lg font-medium leading-6 text-gray-900">New Option</h3>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <x-label> Question </x-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select name="question_id" class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-[#173a68] focus:border-[#173a68] sm:max-w-xs sm:text-sm">
                    <option>Please select..... </option>
                    @foreach($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->question_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
      
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> Option Text </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-textarea-forms type="text" name="option_name" value="{{ old('option_name') }}"></x-textarea-forms>
                    </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <x-label> Points </x-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select name="points" class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-[#173a68] focus:border-[#173a68] sm:max-w-xs sm:text-sm">
                    <option value="0"> 0 points</option>
                    <option value="1"> 1 point</option>
                  </select>
                </div>
            </div> 
      
        <div class="pt-5">
          <div class="flex justify-end">
            <x-button-link-small href="{{ route('questions.index') }}">Cancel</x-button-link-small>
            <x-button-small type="submit" class=ml-3>Save</x-button-small>
          </div>
        </div>
      </form>
    </div>
    </x-app-layout>
    