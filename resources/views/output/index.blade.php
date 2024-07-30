<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Outputs') }}
            </h2>
    </x-slot>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg container mx-auto my-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    IP Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Data from Survey
                </th>
                <th scope="col" class="px-6 py-3">
                    Data from Quiz
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outputs as $output)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$output->ip_address}}
                </th>
                <td class="px-6 py-4">
                    {{$output->data}}
                </td>
                <td class="px-6 py-4">
                    {{$output->data2}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


</x-app-layout>
