<nav class="relative container mx-auto p-6 bg-gray-400 text-white">
    {{--    Flex container--}}
    <div class="flex items-center justify-between">
        {{--        Logo--}}
        <div class="pt-2 rounded-full bg-white">
            <a href="/">
                <img class="w-20" src="/static/images/logo.png" alt="car-wash-logo">
            </a>
        </div>
        {{--            Menu Items--}}
        <div class="hidden md:flex gap-5">
            <a href="" class="hover:text-gray-700">درباره ما</a>
            <a href="/invoices/create" class="hover:text-gray-700">ثبت سفارش</a>
            <a href="" class="hover:text-gray-700">پیگیری سفارش</a>
            <a href="" class="hover:text-gray-700">شرکت ها</a>
            <a href="" class="hover:text-gray-700">مراجعه حضوری</a>
        </div>

        {{--        Button--}}
        <a href="" class="hidden md:block p-3 px-6 pt-2 text-white text-center
         bg-slate-700 text-white rounded-full baseline rfont">
            شروع کنید
        </a>

        {{--        Hamburger Menu --}}
        <button id="menu-btn" class="block hamburger md:hidden
         focus:outline-none">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
        </button>
    </div>

</nav>
<div class="container mx-auto px-6 text-white">
    {{--    Mobile Menu--}}
    <div class="md:hidden text-black">
        <div id="menu" class="flex-col
          items-center self-end py-8 mt-10 hidden
          space-y-6 font-bold bg-white sm:w-auto sm:self-center
          left-6 right-6 drop-shadow-md">
            <a href="" class="hover:text-gray-700">درباره ما</a>
            <a href="/invoices/create" class="hover:text-gray-700">ثبت سفارش</a>
            <a href="" class="hover:text-gray-700">پیگیری سفارش</a>
            <a href="" class="hover:text-gray-700">شرکت ها</a>
            <a href="" class="hover:text-gray-700">مراجعه حضوری</a>
        </div>
    </div>
</div>
