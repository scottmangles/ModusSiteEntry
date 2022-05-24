<x-app-layout>
  
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Questions</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the induction questions</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <x-button-link href="{{ route('questions.create') }}">Add question</x-button-link>
      </div>
    </div>
    <div class="mt-8 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Id</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Question Name</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($questions as $question)
          <tr>
            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
              {{ $question->id }}
              <dl class="font-normal lg:hidden">
                <dt class="sr-only">Title</dt>
                <dd class="mt-1 text-gray-700 truncate">{{ $question->question_name }}</dd>
              </dl>
            </td>
            <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $question->question_name }}</td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
              <a href="{{ route('questions.edit', ['question' => $question->id]) }}" class="text-[#173a68] hover:text-blue-800">Edit</a>
            </td>
            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
              <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
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