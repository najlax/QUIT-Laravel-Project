<x-app-layout>
    <x-head>مجموعة البيانات</x-head>

    <div class="border border-solid border-gray-500 m-10 shadow-sm py-5">
    <h2 class="font-bold text-lg mx-6">{{$dataset->arabic_title}}</h2>
    <div class="text-sm text-slate-800 mx-6">published by: {{$dataset->user->name}}</div>
    </div>

</x-app-layout>