<x-app-layout>
  
  <div class="px-4 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-xl font-semibold text-gray-900">Dashboard</h1>
        </div>
  </div>
      <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Id</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Induction Status</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Completion Date</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Expiry Date</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-3 py-4 text-sm text-gray-500">{{ $user->id }}</td>
              <td class="px-3 py-4 text-sm text-gray-500">{{ $user->name }}</td>
              <td class="py-4 pl-3 pr-4 text-sm font-medium">
                
               @if ($user->induction_expires != null && $user->induction_expires >= \Carbon\Carbon::now())
               <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                <span class="flex items-center space-x-3 truncate">
                  <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                  <span class="text-sm font-medium leading-6 truncate">
                    Complete
                  </span>
                </span>
              </div>

               @else
               <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                <span class="flex items-center space-x-3 truncate">
                  <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-red-600" aria-hidden="true"></span>
                  <span class="text-sm font-medium leading-6 truncate">
                    Incomplete
                  </span>
                </span>
              </div>
              <a href="{{ route('induction') }}" class="text-[#173a68] hover:text-blue-800">Click here to complete</a>

               @endif

              </td>
              <td class="px-3 py-4 text-sm text-gray-500">{{ $user->induction_completed }}</td>
              <td class="px-3 py-4 text-sm text-gray-500">{{ $user->induction_expires }}</td>
            </tr>
          </tbody>
        </table>
      </div>
   <br>
  
      <h2 class="mt-5 text-xl font-semibold text-gray-900">Site Access</h2>
    <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Site Name</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Status</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Site Manager</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Contact Number</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Contact Email</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($sites as $site)
          @foreach($user->siteInductions as $induction )
          
          <tr>
            <td class="px-3 py-4 text-sm text-gray-500">{{ $site->name }}</td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium">

            <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
              <span class="flex items-center space-x-3 truncate">
                <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-red-600" aria-hidden="true"></span>
                <span class="text-sm font-medium leading-6 truncate">
                  Contactsite manager
                </span>
              </span>
            </div>
          @endforeach
            @endforeach
            </td>
            <td class="px-3 py-4 text-sm text-gray-500">Joe Bloggs</td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">07756486754</td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">joebloggs@modus.co.uk</td>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">

              <dl class="font-normal lg:hidden">
                <dt class="mt-1 text-gray-500 truncate">07756486754</dt>
                <dd class="mt-1 text-gray-500 truncate">joebloggs@modus.co.uk</dd>
              </dl>
            </td>
          </tr>

          <tr>
            <td class="px-3 py-4 text-sm text-gray-500">Matlock</td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium">
              
             <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
              <span class="flex items-center space-x-3 truncate">
                <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                <span class="text-sm font-medium leading-6 truncate">
                  Access Granted
                </span>
              </span>
            </div>


            </td>
            <td class="px-3 py-4 text-sm text-gray-500">John Smith</td>
            <td class="px-3 py-4 text-sm text-gray-500">07575978576</td>
            <td class="px-3 py-4 text-sm text-gray-500">johnsmith@modus.co.uk</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>

</div>
  
  </x-app-layout>