<x-layout>
    <x-user-navbar/>

    <form action="/users/{{ $user->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="flex justify-between gap-3 w-8/12 mx-auto mt-12">
            <div class="flex flex-col gap-2">
                <label for="name">نام و نام خانوادگی</label>
                <input
                    class="w-64 rounded border-2 border-blue-400"
                    name="name" id="name" type="text" value="{{ $user->name }}">
            </div>
            <div class="flex flex-col gap-2">
                <label for="phone">تلفن همراه</label>
                <input
                    class="w-64 rounded border-2 border-blue-400"
                    name="phone" id="phone" type="text" value="{{ $user->phone }}">
            </div>

            <div class="flex flex-col gap-2">
                <label for="email">ایمیل</label>
                <input
                    class="w-64 rounded border-2 border-blue-400"
                    name="email" id="email" type="text" value="{{ $user->email }}">
            </div>
        </div>

        <div class="text-center">
            <button class="bg-slate-700 mt-6 rounded px-2 py-1 text-white mx-auto">
                بروز رسانی
            </button>
        </div>
    </form>
    <hr class="mt-12">
    <div style="height: 400px">

    </div>
</x-layout>
