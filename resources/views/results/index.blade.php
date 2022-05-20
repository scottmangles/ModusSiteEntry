<x-app-layout>
  
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Induction Results</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all completed questionnaires</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <x-button-link>Add option</x-button-link>
      </div>
    </div>
    <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 sm:pl-6">Id</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 sm:pl-6">User Id</th>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">User</th>
            <th scope="col" class="flex items-center justify-center py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Total Points</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($results as $result)
          <tr>
            <td class="py-3.5 pl-4 pr-3 text-left text-sm  text-gray-500">{{ $result->created_at->format('d/m/Y') }}</td>
            <td class="py-3.5 pl-5 pr-3 text-left text-sm  text-gray-500">{{ $result->id }}</td>
            <td class="py-3.5 pl-5 pr-3 text-left text-sm  text-gray-500">{{ $result->user->id }}</td>
            <td class="py-3.5 pl-4 pr-3 text-left text-sm  text-gray-500">{{ $result->user->name }}</td>
            <td class="flex items-center justify-center py-3.5 pl-4 pr-3 text-left text-sm  text-gray-500">{{ $result->total_points }}</td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
              <a href="#" class="text-[#173a68] hover:text-blue-800">Edit</a>
              <a href="#" class="ml-4 text-red-600 hover:text-red-900">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</x-app-layout>