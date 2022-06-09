<x-app-layout>
  
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Options</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the options, please allow 4 per question and only allow 1 correct option per question</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <x-button-link href="{{ route('options.create') }}">Add option</x-button-link>
      </div>
    </div>
  </div>
    <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Id</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Option</th>
            <th scope="col" class="flex items-center justify-center py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Question number</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Question</th>
            <th scope="col" class="flex items-center justify-center py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Points</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($options as $option)
          <tr>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
              {{ $option->id }}
              <dl class="font-normal lg:hidden">
                <dt class="sr-only">Option name</dt>
                <dd class="mt-1 text-gray-700 truncate">{{ $option->option_name }}</dd>
              </dl>
            </td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $option->option_name }}</td>
            <td class="flex items-center justify-center px-3 py-4 text-sm text-gray-500">{{ $option->question->id }}</td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $option->question->question_name }}</td>
            <td class="flex items-center justify-center px-3 py-4 text-sm text-gray-500">{{ $option->points }}</td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
              <a href="{{ route('options.edit', ['option' => $option->id]) }}" class="text-[#173a68] hover:text-blue-800">Edit</a>
            </td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
              <form action="{{ route('options.destroy', $option->id) }}" method="POST">
                @csrf
                @method('DELETE')
            
                <button type="submit" onclick="return confirm('Are you sure?')" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
            </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</x-app-layout>