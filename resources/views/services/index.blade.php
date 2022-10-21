<x-layout>
    <x-admin-navbar/>

    <form action="/services" method="post">
        @csrf
        <div class="w-8/12 mx-auto text-center my-5 ">
            <p class="my-2">افزودن سرویس جدید</p>
            <div class="flex justify-between">
                <div>
                    <input name="name" placeholder="نام سرویس" type="text"
                           class="w-48 rounded p-2 border-2 border-blue-600">
                </div>

                <div>
                    <input name="cost" placeholder="هزینه" type="text"
                           class="w-48 rounded p-2 border-2 border-blue-600">
                </div>

                <div>
                    <input name="duration" placeholder="مدت زمان" type="text"
                           class="w-48 rounded p-2 border-2 border-blue-600">
                </div>
            </div>

            <div>
                <button type="submit" class="px-2 py-1 rounded w-24 bg-slate-700 text-white my-2">
                    افزودن
                </button>
            </div>
        </div>

    </form>

    <hr>

    <div class="lg:w-4/5 w-full p-5 mx-auto bg-white rounded-2xl pt-8 shadow shadow-blue-100">
        <p>تعداد کاربران : {{ $services->count() }}</p>
        @forelse($services as $service)
            <div class="bg-slate-700 m-3 p-3 rounded-xl text-white flex justify-around
             border-2 border-white">
                <input type="hidden" id="service_{{ $service->id }}" value="{{ $service->id }}">
                <div class="w-32">

                    <input id="name" class="rounded w-24 text-black text-sm" type="text" value="{{ $service->name }}">
                </div>
                <div class="w-32">

                    <input id="cost" class="rounded w-24 text-black text-sm" type="text" value="{{ $service->cost }}">
                </div>
                <div class="w-32">

                    <input id="duration" class="rounded w-24 text-black text-sm" type="text"
                           value="{{ $service->duration }}">
                </div>


                <div class="w-32">
                    <a class="text-green-400" href="/services/{{ $service->id }}/edit">ویرایش</a>
                </div>

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
        @empty
            <p class="text-center mt-5">سرویسی یافت نشد :(</p>
        @endforelse

    </div>


    <div style="height: 200px">

    </div>

</x-layout>
