<x-app-layout>
    <x-head>مجموعة بيانات جديدة</x-head>

    <x-forms.form method="POST" action="/index/datasets">
        <x-forms.input label="العنوان بالعربية" name="arabic_title" placeholder="--" />
        <x-forms.input label="العنوان بالانجليزية" name="english_title" placeholder="--" />
        
        <div class="flex">
        @foreach($tags as $tag)
        <x-forms.checkbox label="{{$tag->name}}" name="{{$tag->name}}" value="{{$tag->id}}"></x-forms.checkbox>
        @endforeach
        </div>

        <x-forms.select label="التحديث الدوري" name="updates">
            <option>سنوي</option>
            <option>شهري</option>
            <option>--</option>
        </x-forms.select>

        <x-forms.select label="الحالة" name="status">
            <option>منشور</option>
            <option>غير منشور</option>
        </x-forms.select>



        <x-forms.button>إرسال</x-forms.button>

    </x-forms.form>

</x-app-layout>