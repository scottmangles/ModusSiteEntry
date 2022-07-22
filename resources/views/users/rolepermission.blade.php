<x-app-layout>

    <div class="mx-5 my-5">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ $user->name }}</h1>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <x-button-link href="{{ route('users.index') }}">Back to users</x-button-link>
          </div>
        </div>
            <form class="space-y-8 divide-y divide-gray-200"
                method="Get"
                action="{{ route('updaterole', $user->id) }}"
                >
                @csrf
            <div class="mt-5 mb-5">
                <h4 class="font-medium leading-6 text-gray-900 text-md">Role</h4>
              </div>
              @foreach ($user->roles as $role)
              <span class="inline-flex rounded-full items-center py-0.5 pl-2.5 pr-1 text-sm font-medium bg-indigo-100 text-[#173a68] mt-3 mb-3">
                {{ $role->name }}
                <a href="{{ route('removerole', ['user_id' =>$user->id]) }}" type="button" class=ml-3 onclick="return confirm('Remove {{ $role->name }} role from user?')" class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-[#173a68] hover:bg-blue-200 hover:text-blue-500 focus:outline-none focus:bg-blue-500 focus:text-white">
                  <span class="sr-only">Remove role</span>
                  <svg class="w-2 h-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                  </svg>
                </a>
              </span>
              @endforeach
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <x-label>Change role </x-label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select name="role" class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-[#173a68] focus:border-[#173a68] sm:max-w-xs sm:text-sm">
                    @if($user->hasAnyRole($roles))
                        <option selected value="{{ old('id') ?? $role->id }}" selected>{{ $role->name }}</option>
                    @else
                        <option disabled selected >Please select ...</option>
                    @endif
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>

                </div>
            </div>
        <div class="pt-5">
          <div class="flex justify-end">
            <x-button-small type="submit" class=ml-3 onclick="return confirm('Assign new role to user?')" >Assign</x-button-small>
          </div>
        </div>
      </form>


        <form class="space-y-8 divide-y divide-gray-200"
            method="Get"
            action="{{ route('addpermission', $user->id) }}"
            >
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
              <div>
                <div class="mt-5 mb-5">
                    <h4 class="font-medium leading-6 text-gray-900 text-md">Permissions</h4>
                  </div>
                  @foreach ($user->permissions as $permission)
                  <span class="inline-flex rounded-full items-center py-0.5 pl-2.5 pr-1 text-sm font-medium bg-indigo-100 text-[#173a68] mt-3 mb-3">
                    {{ $permission->name }}
                    <a href="{{ route('removepermission', ['user_id' =>$user->id, 'permission_id' => $permission->id]) }}" type="button" class=ml-3 onclick="return confirm('Remove {{ $permission->name }} role from user?')" class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-[#173a68] hover:bg-blue-200 hover:text-blue-500 focus:outline-none focus:bg-blue-500 focus:text-white">
                      <span class="sr-only">Remove permission</span>
                      <svg class="w-2 h-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                        <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                      </svg>
                    </a>
                  </span>
                  @endforeach
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <x-label>Add permission </x-label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <select name="permission" class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-[#173a68] focus:border-[#173a68] sm:max-w-xs sm:text-sm">
                            <option disabled selected >Please select ...</option>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                      @endforeach
                    </select>
                    </div>
                </div>
            <div class="pt-5">
              <div class="flex justify-end">
                <x-button-small type="submit" class=ml-3 onclick="return confirm('Assign new role to user?')">Assign</x-button-small>
              </div>
            </div>
          </form>
        </div>
    </x-app-layout>
    