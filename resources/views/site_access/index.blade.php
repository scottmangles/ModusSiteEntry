<x-app-layout>
  
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Users allowed access to {{ Auth::user()->siteManager->name }} site</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all users with access to site</p>
          </div>
          <form class="flex items-center">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#173a68] focus:border-[#173a68] block w-full pl-10 p-2.5" placeholder="Search">
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-[#173a68] rounded-lg border border-[#173a68] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-[#173a68]"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
        </form>
        </div>
    </div>
        <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Id</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Role</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Company</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Mobile</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:hidden">Contact</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($usersInducted as $siteInduction)
              <tr>
                <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
                  {{ $siteInduction->user->id }}
                </td>
                <td class="w-full py-4 pl-4 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">{{ $siteInduction->user->name }}</td>
                <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $siteInduction->user->role }}</td>
                <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">{{ $siteInduction->user->contractor->name }}</td>
                <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $siteInduction->user->email }}</td>
                <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $siteInduction->user->mobile }}</td>
                <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
                    <dl class="font-normal lg:hidden">
                      <dt class="mt-1 text-gray-500 truncate">{{ $siteInduction->user->mobile }}</dt>
                      <dd class="mt-1 text-gray-500 truncate">{{ $siteInduction->user->email }}</dd>
                    </dl>
                  </td>
                <td class="w-full py-4 pl-4 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6"></td>
  
                <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                  <x-button-link-small href="{{ route('allowAccess', [$siteInduction->user->id, $site->id]) }}">Allow</x-button-link-small>
                </td>
                <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                    <x-button-link-small>Supervise</x-button-link-small>
                  </td>
                  <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                    <x-button-link-small> Ban </x-button-link-small>
                  </td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {{ $usersInducted->links() }}
      </div>
      <br>
      <div class="mt-10 mb-10">

      </div>

      <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">User with no access to {{ Auth::user()->siteManager->name }} site</h1>
            <p class="mt-2 text-sm text-gray-700">Users require site manager approval</p>
          </div>
          <form class="flex items-center">   
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#173a68] focus:border-[#173a68] block w-full pl-10 p-2.5" placeholder="Search">
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-[#173a68] rounded-lg border border-[#173a68] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-[#173a68]"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
        </form>
        </div>
    </div>
        <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Id</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Role</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Company</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Mobile</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:hidden">Contact</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">granted</span>
                </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">warning</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($users as $user)
              <tr>
                <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
                  {{ $user->id }}
                </td>
                <td class="w-full py-4 pl-4 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">{{ $user->name }}</td>
                <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->role }}</td>
                <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">{{ $user->contractor->name }}</td>
                <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->email }}</td>
                <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->mobile }}</td>
                <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
                    <dl class="font-normal lg:hidden">
                      <dt class="mt-1 text-gray-500 truncate">{{ $user->mobile }}</dt>
                      <dd class="mt-1 text-gray-500 truncate">{{ $user->email }}</dd>
                    </dl>
                  </td>
                <td class="w-full py-4 pl-4 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6"></td>
   
                <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                  <x-button-link-small href="{{ route('allowAccess', [$user->id, $site->id]) }}">Allow</x-button-link-small>
                </td>
                <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                    <x-button-link-small href="{{ route('allowSupervised', [$user->id, $site->id]) }}">Supervise</x-button-link-small>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {{ $users->links() }}
      </div>
      </div>
    
    </x-app-layout>