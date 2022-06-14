<x-app-layout>
    <div class="mx-5 my-5">
    <form class="space-y-8 divide-y divide-gray-200"
        method="POST"
        action="{{ route('contractors.update', ['contractor' => $contractor->id]) }}"
        >
        @csrf
        @method('PUT')
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div>
              <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Contractor</h3>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> Contractor name </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="name" value="{{ old('name') ?? $contractor->name }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> Contact person </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="contact_person" value="{{ old('contact_person') ?? $contractor->contact_person }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> Phone </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="text" name="phone" value="{{ old('phone') ?? $contractor->phone }}"></x-input>
                    </div>
                </div>
            </div>
            <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label> Email </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <x-input type="email" name="email" value="{{ old('email') ?? $contractor->email }}"></x-input>
                    </div>
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
    