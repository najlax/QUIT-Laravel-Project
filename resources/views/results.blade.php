@props(['datasets'])
<x-app-layout>
    <x-head>Results</x-head>

    <div class="p-10 border border-gray-700">
        @foreach($datasets as $dataset)
        <x-datacard :$dataset />
        @endforeach
    </div>
</x-app-layout>