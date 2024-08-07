<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $question->title }}
            </h2>
            <a href="{{route('answers.create', $question->id)}}">Add Answer</a>
        </div>
    </x-slot>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg container mx-auto my-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Answer Text
                </th>
                <th scope="col" class="px-6 py-3">
                    Value
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($question->answers as $answer)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$answer->body}}
                </th>
                <td class="px-6 py-4">
                    {{$answer->value}}
                </td>
                <td class="px-6 py-4">
                    <form action="{{route('answers.destroy', [$question->id, $answer->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 hover:underline">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-app-layout>
