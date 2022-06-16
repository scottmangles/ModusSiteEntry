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
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Role</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Company</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Mobile</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">granted</span>
                </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">warning</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($usersInducted as $siteInduction)
              <tr>
                @if ($siteInduction->status == 'access granted')
                <td class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                  <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                      <span class="flex items-center space-x-3 truncate">
                          <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                          <span class="text-sm font-medium leading-6 truncate">
                                {{ $siteInduction->user->id }}
                          </span>
                      </span>
                  </div>
                </td>
                @else
                <td class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                  <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                      <span class="flex items-center space-x-3 truncate">
                          <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-orange-600" aria-hidden="true"></span>
                          <span class="text-sm font-medium leading-6 truncate">
                                {{ $siteInduction->user->id }}
                          </span>
                      </span>
                  </div>
                </td>
                @endif
                <td class="py-4 pl-4 text-sm font-medium text-left text-gray-500 max-w-0">{{ $siteInduction->user->name }}</td>
                <td class="hidden py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-500 sm:pl-6 lg:table-cell">{{ $siteInduction->user->role }}</td>
                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0">{{ $siteInduction->user->contractor->name }}</td>
                <td class="hidden py-4 text-sm text-gray-500 hiddenpx-3 lg:table-cell">{{ $siteInduction->user->email }}</td>
                <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $siteInduction->user->mobile }}</td>
                @if ($siteInduction->status == 'access warning')
                <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                  <form action="{{ route('changeToAccess', [$siteInduction->id, $siteInduction->user->id, $site->id]) }}" method="GET">
                    @csrf
                
                    <button type="submit" onclick="return confirm('Are you sure you want to switch user to Green status??')" class="ml-4 text-green-600 hover:text-green-900">Give Green status</button>
                </form>
                </td>
                @else
                <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                  <form action="{{ route('changeToSupervised', [$siteInduction->id, $siteInduction->user->id, $site->id]) }}" method="GET">
                    @csrf
                
                    <button type="submit" onclick="return confirm('Are you sure you want to switch user to Amber status?')" class="ml-4 text-orange-600 hover:text-orange-900">Give Amber status</button>
                </form>
                </td>
                @endif
                  <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                    <form action="{{ route('banAccess', [$siteInduction->id, $siteInduction->user->id, $site->id]) }}" method="GET">
                      @csrf
                  
                      <button type="submit" onclick="return confirm('Are you sure you want to Ban user from site?')" class="ml-4 text-red-600 hover:text-red-900">Ban user</button>
                  </form>
                  </td>
               </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div>
          {{ $usersInducted->links() }}
      </div>
     
    
    </x-app-layout>