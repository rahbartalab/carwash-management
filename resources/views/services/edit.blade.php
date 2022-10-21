<x-layout>
    <x-admin-navbar/>


    <div class="bg-slate-700 w-7/12 mx-auto m-3 p-3 rounded-xl text-white flex justify-around
             border-2 border-white">
        <form action="/services/{{ $service->id}}" method="post" class="flex gap-2">
            <input type="hidden" id="service_{{ $service->id }}" value="{{ $service->id }}">
            <div class="w-32">

                <input name="name" id="name" class="rounded w-24 text-black text-sm" type="text"
                       value="{{ $service->name }}">
            </div>
            <div class="w-32">

                <input name="cost" id="cost" class="rounded w-24 text-black text-sm" type="text"
                       value="{{ $service->cost }}">
            </div>
            <div class="w-32">

                <input name="duration" id="duration" class="rounded w-24 text-black text-sm" type="text"
                       value="{{ $service->duration }}">
            </div>


            <div class="w-32">


                @csrf
                @method('PATCH')
                <input
                    class="rounded border-2 border-gray-300 w-24 text-green-500 cursor-pointer text-sm bg-slate-300 px-3 py-1"
                    type="submit"
                    value="ویرایش">


            </div>
        </form>
        <div class="w-32">

            <form action="/services/{{ $service->id}}" method="post">
                @csrf
                @method('DELETE')
                <input
                    class="rounded w-24 text-red-500 cursor-pointer text-sm bg-slate-300 px-3 py-1"
                    type="submit"
                    value="حذف">
            </form>

        </div>
    </div>

    <div style="height: 350px">

    </div>
</x-layout>
