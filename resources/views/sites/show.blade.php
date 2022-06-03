<x-app-layout>
    
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">XXX Site</h1>
          </div>
          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <x-button-link-small>Sign Personel On Site</x-button-link-small>
          </div>
        </div>
    </div>
        
    <h2 class="mt-5 text-xl font-semibold text-gray-900">On Site</h2>
    <p class="mt-2 text-sm text-gray-700">3/06/22 currently XXX personel on site</p>

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
            <tr>
                <td class="px-3 py-4 text-sm text-gray-500">
                    <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                        <span class="flex items-center space-x-3 truncate">
                            <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-orange-600" aria-hidden="true"></span>
                            <span class="text-sm font-medium leading-6 truncate">
                                  1
                            </span>
                        </span>
                    </div>
                </td>
              <td class="px-3 py-4 text-sm text-gray-500">John Smith</td>
              <td class="px-3 py-4 text-sm text-gray-500">Block Bro's Bricklayers</td>

              <td class="px-3 py-4 text-sm text-gray-500">07:33</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">077685746555</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">john566@bbros.co.uk</td>
              <td class="px-3 py-4 text-sm text-gray-500"><x-button-link-small>Sign Out</x-button-link-small></td>
            </tr>

            <tr>
                <td class="px-3 py-4 text-sm text-gray-500">
                    <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                        <span class="flex items-center space-x-3 truncate">
                            <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                            <span class="text-sm font-medium leading-6 truncate">
                                  6
                            </span>
                        </span>
                    </div>
                </td>
              <td class="px-3 py-4 text-sm text-gray-500">Sam Rooney</td>
              <td class="px-3 py-4 text-sm text-gray-500">Mario's Plumbers</td>

              <td class="px-3 py-4 text-sm text-gray-500">07:31</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">07567876543</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">sam@mariusplumb.co.uk</td>
              <td class="px-3 py-4 text-sm text-gray-500"><x-button-link-small>Sign Out</x-button-link-small></td>
            </tr>

            <tr>
                <td class="px-3 py-4 text-sm text-gray-500">
                    <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                        <span class="flex items-center space-x-3 truncate">
                            <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                            <span class="text-sm font-medium leading-6 truncate">
                                  55
                            </span>
                        </span>
                    </div>
                </td>
              <td class="px-3 py-4 text-sm text-gray-500">Joe Bloggs</td>
              <td class="px-3 py-4 text-sm text-gray-500">Mario's Plumbers</td>

              <td class="px-3 py-4 text-sm text-gray-500">07:30</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">07756486754</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">joebloggs@mariusplumb.co.uk</td>
              <td class="px-3 py-4 text-sm text-gray-500"><x-button-link-small>Sign Out</x-button-link-small></td>
            </tr>
          </tbody>
        </table>
      </div>

    <br>

    <h2 class="mt-5 text-xl font-semibold text-gray-900">Left Site</h2>
    <p class="mt-2 text-sm text-gray-700">3/06/22 currently XXX personel left site</p>

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
            <tr>
                <td class="px-3 py-4 text-sm text-gray-500">
                    <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                        <span class="flex items-center space-x-3 truncate">
                            <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-orange-600" aria-hidden="true"></span>
                            <span class="text-sm font-medium leading-6 truncate">
                                  66
                            </span>
                        </span>
                    </div>
                </td>
              <td class="px-3 py-4 text-sm text-gray-500">Jack Black</td>
              <td class="px-3 py-4 text-sm text-gray-500">Block Bro's Bricklayers</td>
              <td class="px-3 py-4 text-sm text-gray-500">07:34</td>
              <td class="px-3 py-4 text-sm text-gray-500">16:03</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">077685746555</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">jack566@bbros.co.uk</td>
            </tr>

            <tr>
                <td class="px-3 py-4 text-sm text-gray-500">
                    <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                        <span class="flex items-center space-x-3 truncate">
                            <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                            <span class="text-sm font-medium leading-6 truncate">
                                  18
                            </span>
                        </span>
                    </div>
                </td>
              <td class="px-3 py-4 text-sm text-gray-500">Harry Hill</td>
              <td class="px-3 py-4 text-sm text-gray-500">Mario's Plumbers</td>
              <td class="px-3 py-4 text-sm text-gray-500">07:31</td>
              <td class="px-3 py-4 text-sm text-gray-500">16:03</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">07567876543</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">harry@mariusplumb.co.uk</td>
            </tr>

            <tr>
                <td class="px-3 py-4 text-sm text-gray-500">
                    <div class="flex items-center justify-between py-4 group hover:bg-gray-50">
                        <span class="flex items-center space-x-3 truncate">
                            <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-green-600" aria-hidden="true"></span>
                            <span class="text-sm font-medium leading-6 truncate">
                                  19
                            </span>
                        </span>
                    </div>
                </td>
              <td class="px-3 py-4 text-sm text-gray-500">Stephanie Still</td>
              <td class="px-3 py-4 text-sm text-gray-500">Mario's Plumbers</td>
              <td class="px-3 py-4 text-sm text-gray-500">07:30</td>
              <td class="px-3 py-4 text-sm text-gray-500">16:03</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">07756486754</td>
              <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">steph@mariusplumb.co.uk</td>
            </tr>
  
           
          </tbody>
        </table>
      </div>
    </div>
  </div>

</x-app-layout>