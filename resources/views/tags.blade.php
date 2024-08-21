@props(['tags'])
<x-app-layout>
    <x-head> الوسوم</x-head>
    <div class="mt-12">
        <div class="bg-white overflow-auto">
            <table class="text-right w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">الاسم </th>
                    </tr>
                </thead>
                @foreach($tags as $tag)
                <x-tag :$tag />
                @endforeach
            </table>
        </div>
    </div>

    <div>
        {{$tags->links()}}
    </div>

</x-app-layout>