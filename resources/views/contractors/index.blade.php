<x-app-layout>
  
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Contractors</h1>
      <p class="mt-2 text-sm text-gray-700">A list of all contractors currently on system</p>
    </div>
    @can('create contractor')
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <x-button-link href="{{ route('contractors.create') }}">Add contractor</x-button-link>
    </div>
    @endcan

  </div>
</div>    
    <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Id</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Company name</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Contact person</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Contact Number</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Contact Email</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:hidden">Contact</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($contractors as $contractor)
          <tr>
            <td class="px-3 py-4 text-sm text-gray-500">{{ $contractor->id }}</td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium">{{ $contractor->name }}</td>
            <td class="px-3 py-4 text-sm text-gray-500">{{ $contractor->contact_person }}</td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $contractor->phone }}</td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $contractor->email }}</td>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
              <dl class="font-normal lg:hidden">
                <dt class="mt-1 text-gray-500 truncate">{{ $contractor->phone }}</dt>
                <dd class="mt-1 text-gray-500 truncate">{{ $contractor->email }}</dd>
              </dl>
            </td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
              <a href="{{ route('contractors.edit', ['contractor' => $contractor->id]) }}" class="text-[#173a68] hover:text-blue-800">Edit</a>
            </td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
              <form action="{{ route('contractors.destroy', $contractor->id) }}" method="POST">
                @csrf
                @method('DELETE')
            
                <button type="submit" onclick="return confirm('You do not have permission to delete a contractor please contct database admin')" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
        {{ $contractors->links() }}
    </div>
  </div>
</div>
  </x-app-layout>