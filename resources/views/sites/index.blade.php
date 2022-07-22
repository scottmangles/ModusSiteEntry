<x-app-layout>
  
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Sites</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all sites currently on system</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        @can('add site')
          <x-button-link href="{{ route('sites.create') }}">Add site</x-button-link>
        @endcan
      </div>
    </div> 
</div>
    <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Id</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Site name</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Site manager</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Site open</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Site closed</th>
            <th scope="col" class="hidden py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:table-cell">Download Qr Codes</th>
            <th scope="col" class="hidden py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:table-cell">Download Qr Codes</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($sites as $site)
          <tr>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
              {{ $site->id }}
            </td>
            <td class="w-full py-4 pl-4 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
              
              @can('show site')
                  <a href="{{ route('sites.show', ['site' => $site]) }}" class="text-[#173a68] hover:text-blue-800">
                    {{ $site->name }}
                  </a>
              @else
              {{ $site->name }}
              @endcan
            </td>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">{{ $site->siteManager->name }}</td>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">{{ Carbon\Carbon::parse($site->open_at)->format('H:i') }}</td>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">{{ Carbon\Carbon::parse($site->closed_at)->format('H:i') }}</td>
            <td class="hidden w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6 lg:table-cell">Sign in Qr</td>
            <td class="hidden w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6 lg:table-cell">Sign out Qr</td>
            @can('edit site')
              <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                <a href="{{ route('sites.edit', ['site' => $site->id]) }}" class="text-[#173a68] hover:text-blue-800">Edit</a>
              </td>
            @endcan
            @can('delete site')
              <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                <form action="{{ route('sites.destroy', $site->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
              
                  <button type="submit" onclick="return confirm('You do not have permission to delete a site please contct database admin')" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
              </form>
              </td>
            @endcan
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
      {{ $sites->links() }}
  </div>
  </div>

</x-app-layout>