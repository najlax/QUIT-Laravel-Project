<x-app-layout>
    <x-head>تعديل مجموعة البيانات {{$dataset->arabic_title}}</x-head>

    <x-forms.form method="POST" action="/index/datasets/{{$dataset->id}}">
        @csrf
        @method('PATCH')
        <x-forms.input label="العنوان بالعربية" name="arabic_title" placeholder="--" value="{{$dataset->arabic_title}}" />
        <x-forms.input label="العنوان بالانجليزية" name="english_title" placeholder="--" value="{{$dataset->english_title}}" />

        <div class="flex">
        @foreach($tags as $tag)
        @if($dataset->tags->contains($tag))
        <x-forms.checkbox label="{{$tag->name}}" name="{{$tag->name}}" value="{{$tag->id}}" checked></x-forms.checkbox>
        @else
        <x-forms.checkbox label="{{$tag->name}}" name="{{$tag->name}}" value="{{$tag->id}}"></x-forms.checkbox>
        @endif
        @endforeach
        </div>

        <x-forms.select label="التحديث الدوري" name="updates" value="{{$dataset->updates}}">
            <option>سنوي</option>
            <option>شهري</option>
            <option>--</option>
        </x-forms.select>

        <x-forms.select label="الحالة" name="status" value="{{$dataset->status}}">
            <option>منشور</option>
            <option>غير منشور</option>
        </x-forms.select>


        <x-forms.button>تعديل</x-forms.button>

    </x-forms.form>

</x-app-layout>