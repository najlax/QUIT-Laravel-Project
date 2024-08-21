@props(['tag'])
<tbody>
    <tr class="hover:bg-grey-lighter">
        <div>
        <td href="/tags/{{strtolower($tag->name)}}"class="py-4 px-6 border-b border-grey-light">{{$tag->name}}
        <div class="flex justify-end gap-x-3">
            <a href="/index/tags/{{$tag->name}}/edit" class="bg-blue-800 rounded py-1 px-2 text-white">تعديل</a>
            <button form="delete-form" class="bg-red-800 rounded py-1 px-2 text-white">حذف</button>
        </div>
        </td>
</div>
    </tr>

    <x-forms.form method="POST" id="delete-form" action="/index/tags/{{$tag->name}}" class="hidden">
        @csrf
        @method('DELETE')
    </x-forms.form>

</tbody>