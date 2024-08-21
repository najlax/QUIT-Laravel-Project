<x-app-layout>
    <x-head>تعديل الوسم {{$tag->name}}</x-head>

    <x-forms.form method="POST" action="/index/tags/{{$tag->name}}">
        @csrf
        @method('PATCH')
        <x-forms.input label="الوسم" name="name" placeholder="--" value="{{$tag->name}}" />


        <x-forms.button>تعديل</x-forms.button>

    </x-forms.form>

</x-app-layout>