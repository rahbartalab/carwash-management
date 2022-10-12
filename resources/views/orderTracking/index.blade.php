<x-layout>


    <div class="w-96 mx-auto mt-5 bg-gray-300 p-5 rounded-xl shadow-2xl border-t-4 border-t-slate-700">
        <p>
            اطلاعات مورد نیاز را برای پیگیری سفارش خود وارد کنید
        </p>

        <div class="flex flex-col gap-2 w-64 mx-auto mt-3 border-t border-slate-700 p-2 mt-2">
            <label for="phone" class="block">
                تلفن همراه
            </label>
            <input
                name="phone"
                id="phone"
                type="text"
                class="rounded-xl px-2 py-2 focus:outline-none">

        </div>

        <div class="flex flex-col gap-2 w-64 mx-auto mt-3 border-t border-slate-700 p-2 mt-2">
            <label for="phone" class="block">
                کد پیگیری
            </label>
            <input
                name="code"
                id="phone"
                type="text"
                class="rounded-xl px-2 py-2 focus:outline-none">

        </div>

        <div class="w-96 text-center mt-6 mx-auto">
            <form action="/track-order" method="post">
                @csrf

                <button class="bg-slate-700 text-white px-4 py-2 rounded-xl hover:bg-slate-600 transition">
                    پیگیری سفارش
                </button>
            </form>
        </div>
    </div>

</x-layout>
