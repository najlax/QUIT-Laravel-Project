<x-app-layout>
    <x-head>مجاميع البيانات</x-head>

    <div class="mt-12">
        <div class="bg-white overflow-auto">
            <table class="text-right w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">العنوان بالعربية</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">العنوان بالانجليزية</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">التحديث الدوري</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">الحالة</th>
                    </tr>
                </thead>
            </div>
        <div>
            @foreach($datasets as $dataset)
            <x-datacard :$dataset />
            @endforeach
        </div>
        </table>
    </div>

    <div>
        {{$datasets->links()}}
    </div>

</x-app-layout>