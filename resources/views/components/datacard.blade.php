@props(['dataset'])
<tbody>
    <tr class="hover:bg-grey-lighter">
        <td class="py-4 px-6 border-b border-grey-light">{{$dataset->arabic_title}}</td>
        <td class="py-4 px-6 border-b border-grey-light">{{$dataset->english_title}}</td>
        <td class="py-4 px-6 border-b border-grey-light">{{$dataset->updates}}</td>
        <td class="py-4 px-6 border-b border-grey-light">{{$dataset->status}}
        <div class="flex justify-end gap-x-3">
            <a href="/index/datasets/{{$dataset->id}}" class="bg-blue-800 rounded py-1 px-2 text-white">عرض</a>
            <a href="/index/datasets/{{$dataset->id}}/edit" class="bg-blue-800 rounded py-1 px-2 text-white">تعديل</a>
            <button form="delete-form" class="bg-red-800 rounded py-1 px-2 text-white">حذف</button>
        </div>
        </td>
    </tr>
    <x-forms.form method="POST" id="delete-form" action="/index/datasets/{{$dataset->id}}" class="hidden">
        @csrf
        @method('DELETE')
    </x-forms.form>
</tbody>