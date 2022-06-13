<x-app-layout>
    <div class="mx-5 my-5">
    <form class="space-y-8 divide-y divide-gray-200"
        method="POST"
        action="{{ route('sites.store') }}"
        >
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div>
              <h3 class="text-lg font-medium leading-6 text-gray-900">New Site</h3>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> Site name </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="name" value="{{ old('name') }}"></x-input>
                    </div>
                </div>
            </div>



            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <x-label> Site Manager </x-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select name="site_manager" class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-[#173a68] focus:border-[#173a68] sm:max-w-xs sm:text-sm">
                    <option value="">Please select..... </option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <x-label> Site opens at </x-label>
                <x-input type="time" name="open_at" min="00:01" max="12:00"  value="{{ old('open_at') }}" required></x-input>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <x-label> Site closes at </x-label>
                <x-input type="time" name="closed_at" min="12:01" max="00:00"  value="{{ old('closed_at') }}" required></x-input>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <x-label> Site Status </x-label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <select name="status" class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-[#173a68] focus:border-[#173a68] sm:max-w-xs sm:text-sm">
                  <option value="">Please select..... </option>
                  <option value="active">Active</option>
                  <option value="complete">Complete</option>
                </select>
              </div>
          </div>
            
        <div class="pt-5">
          <div class="flex justify-end">
            <x-button-link-small href="{{ route('sites.index') }}">Cancel</x-button-link-small>
            <x-button-small type="submit" class=ml-3>Save</x-button-small>
          </div>
        </div>
       
      </form>
    </div>
    </x-app-layout>
    