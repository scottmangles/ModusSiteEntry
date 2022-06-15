<x-app-layout>
  
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Users</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all users on system</p>
          </div>
          
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
                  <span class="sr-only">Edit</span>
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
                  <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="text-[#173a68] hover:text-blue-800">Edit</a>
                </td>
                <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                
                    <button type="submit" onclick="return confirm('You do not have permission to delete a user please contct database admin')" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                </form>
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