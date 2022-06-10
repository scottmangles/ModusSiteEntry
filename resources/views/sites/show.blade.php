<x-app-layout>
    
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ $site->name }} Site </h1>
            <br>
            <p>{{ Carbon\Carbon::parse(now())->format('D d M') }}</p>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
 

            <div x-data="{ open: false }">
              <x-button-link-small @click="open = ! open">Sign Personel On Site</x-button-link-small>
           
              <div x-show="open">
                <div class="fixed inset-0 z-50 flex items-start justify-center pt-16 sm:pt-24" id="headlessui-dialog-289" role="dialog" aria-modal="true">
                  <div class="fixed inset-0 transition-opacity bg-gray-800 opacity-100 bg-opacity-60"></div>
                      <div class="relative w-full max-w-lg px-4 transition-all transform scale-100 opacity-100">
                      <div @click.outside="open = false" class="overflow-hidden bg-white rounded-lg shadow-md" id="headlessui-dialog-panel-292">
                          <div class="relative flex items-center pr-4">
                              <input class="flex-auto py-4 pl-4 pr-12 text-base text-gray-600 placeholder-gray-500 bg-transparent appearance-none -mr-9 focus:outline-none sm:text-sm" placeholder="Search users..." aria-label="Search components" id="headlessui-combobox-input-293" role="combobox" type="text" aria-expanded="false" tabindex="0" style="caret-color: rgb(107, 114, 128);">
                              <svg width="20" height="20" fill="none" class="flex-none text-gray-400 pointer-events-none"><circle cx="8.5" cy="8.5" r="5.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle><path d="M17.25 17.25L13 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
          </div>
        </div>
    </div>
   
    <h2 class="mt-5 text-xl font-semibold text-gray-900">On Site</h2>
    <p class="mt-2 text-sm text-gray-700">currently {{ $onSites->count()}} personel on site</p>

      <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">User id</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Sub contractor</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Arrived</th>
              <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Contact number</th>
              <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Contact email</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900"></th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($onSites as $onSite)
            @foreach ($onSite->users as $user)
            @foreach ($user->siteInductions as $siteInduction)
            <tr>
                
             @if ($siteInduction->status == 'access granted')
                <td class="px-3 py-4 text-sm text-gray-500">
                  <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                      <span class="flex items-center space-x-3 truncate">
                          <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                          <span class="text-sm font-medium leading-6 truncate">
                                {{ $user->id }}
                          </span>
                      </span>
                  </div>
                </td>
              @else
                <td class="px-3 py-4 text-sm text-gray-500">
                  <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                      <span class="flex items-center space-x-3 truncate">
                          <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-orange-600" aria-hidden="true"></span>
                          <span class="text-sm font-medium leading-6 truncate">
                                {{ $user->id }}
                          </span>
                      </span>
                  </div>
                </td>
             @endif

            <td class="px-3 py-4 text-sm text-gray-500">{{ $user->name }}</td>
            <td class="px-3 py-4 text-sm text-gray-500">{{ $user->sub_contractor }}</td>
            <td class="px-3 py-4 text-sm text-gray-500">{{ Carbon\Carbon::parse($onSite->time_on_site)->format('H:i') }}</td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->mobile }}</td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->email }}</td>
            <td class="px-3 py-4 text-sm text-gray-500">
              <form action="{{ route('signoutsitemanager', [$onSite->id, $user->id, $site->id]) }}" method="GET">
                @csrf
              <x-button-small type="submit" onclick="return confirm('Are you sure you want to signout?')" class="ml-4">Sign Out</x-button-small>
            </form>
        </td>
          </tr>
          @endforeach
          @endforeach
          @endforeach
          </tbody>
        </table>
      </div>

    <br>

    <h2 class="mt-5 text-xl font-semibold text-gray-900">Left Site</h2>
    <p class="mt-2 text-sm text-gray-700">currently {{ $offSites->count()}} personel left site today</p>

    <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">User id</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Sub contractor</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Arrived</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Left</th>
              <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Contact number</th>
              <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Contact email</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($offSites as $offSite)
            @foreach ($offSite->users as $user)
            @foreach ($user->siteInductions as $siteInduction)
            <tr>
                
              @if ($siteInduction->status == 'access granted')
                <td class="px-3 py-4 text-sm text-gray-500">
                  <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                      <span class="flex items-center space-x-3 truncate">
                          <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                          <span class="text-sm font-medium leading-6 truncate">
                                {{ $user->id }}
                          </span>
                      </span>
                  </div>
                </td>
              @else
                <td class="px-3 py-4 text-sm text-gray-500">
                  <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                      <span class="flex items-center space-x-3 truncate">
                          <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-orange-600" aria-hidden="true"></span>
                          <span class="text-sm font-medium leading-6 truncate">
                                {{ $user->id }}
                          </span>
                      </span>
                  </div>
                </td>
             @endif 

             <td class="px-3 py-4 text-sm text-gray-500">{{ $user->name }}</td>
             <td class="px-3 py-4 text-sm text-gray-500">{{ $user->sub_contractor }}</td>
             <td class="px-3 py-4 text-sm text-gray-500">{{ Carbon\Carbon::parse($offSite->time_on_site)->format('H:i') }}</td>
             <td class="px-3 py-4 text-sm text-gray-500">{{ Carbon\Carbon::parse($offSite->time_off_site)->format('H:i') }}</td>
             <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->mobile }}</td>
             <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->email }}</td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
  
           
          </tbody>
        </table>
      </div>

      <br>

      <h2 class="mt-5 text-xl font-semibold text-gray-900">Contractors Banned From Site Site</h2>
      <p class="mt-2 text-sm text-gray-700">currently XXXX personel banned from {{ $site->name }} site</p>
  
      <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">User id</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Sub contractor</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Date banned</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Banned By</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($bannedSites as $bannedSite)
              <tr>
                  
                  <td class="px-3 py-4 text-sm text-gray-500">
                    <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                        <span class="flex items-center space-x-3 truncate">
                            <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-red-600" aria-hidden="true"></span>
                            <span class="text-sm font-medium leading-6 truncate">
                                  {{ $bannedSite->user->id }}
                            </span>
                        </span>
                    </div>
                  </td>
                  
               <td class="px-3 py-4 text-sm text-gray-500">{{ $bannedSite->user->name }}</td>
               <td class="px-3 py-4 text-sm text-gray-500">{{ $bannedSite->user->sub_contractor }}</td>
               <td class="px-3 py-4 text-sm text-gray-500">{{ $bannedSite->created_at }}</td>
               <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $bannedSite->userBanned->name }}</td>
               <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"><x-button-link-small>View details</x-button-link-small></td>
              </tr>
              @endforeach
    
             
            </tbody>
          </table>
        </div>

    </div>
  </div>
</x-app-layout>