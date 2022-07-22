<x-app-layout>
    <div class="mx-5 my-5">
    <form class="space-y-8 divide-y divide-gray-200"
        method="POST"
        action="{{ route('users.update', ['user' => $user->id]) }}"
        >
        @csrf
        @method('PUT')
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div>
              <h3 class="text-lg font-medium leading-6 text-gray-900">Update user</h3>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> User name </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="name" value="{{ old('name') ?? $user->name }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> User email </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="email" value="{{ old('email') ?? $user->email }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> User mobile </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="mobile" value="{{ old('mobile') ?? $user->mobile }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <x-label>Company </x-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select name="sub_contractor" class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-[#173a68] focus:border-[#173a68] sm:max-w-xs sm:text-sm">
                    @if($user->sub_contractor != NULL)
                        <option value="{{ old('sub_contractor') ?? $user->sub_contractor }}" selected>{{ $user->contractor->name }}</option>  
                    @else
                    <option value="">Please select ....</option>
                    @endif
                    @foreach ($contractors as $contractor)
                    <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                    @endforeach    
                  </select>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> User vehicle make </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="vehicle_make" value="{{ old('vehicle_make') ?? $user->vehicle_make }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> User vehicle reg </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="vehicle_reg" value="{{ old('vehicle_reg') ?? $user->vehicle_reg }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> User cscs number </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="cscs_number" value="{{ old('cscs_number') ?? $user->cscs_number }}"></x-input>
                    </div>
                </div>
            </div>
           
        <div class="pt-5">
          <div class="flex justify-end">
            <x-button-link-small href="{{ URL::previous() }}">Cancel</x-button-link-small>
            <x-button-small type="submit" class=ml-3>Save</x-button-small>
          </div>
        </div>
      </form>
    </div>
    </x-app-layout>
    