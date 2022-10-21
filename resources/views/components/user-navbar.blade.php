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
            <a href="/dashboard" class="hover:text-gray-700">داشبورد</a>
            <a href="/invoices/create" class="hover:text-gray-700">درخواست جدید</a>
            <a href="/users" class="hover:text-gray-700">سابقه درخواست های من</a>

        </div>

        {{--        Button--}}
        @if (auth()->guest())
            <div class="flex gap-2">
                <a href="/register" class="hidden md:block w-28 p-3 px-6 pt-2 text-white text-center
         bg-slate-700 text-white rounded-full baseline rfont">
                    ثبت نام
                </a>
                <a href="/login" class="hidden md:block p-3 px-6 pt-2 text-white text-center
         bg-white text-slate-700 w-28 border border-slate-800 rounded-full baseline rfont">
                    ورود
                </a>
            </div>
        @else
            <div class="flex gap-2">
                <div>
                    <a href="/dashboard" class="hidden md:block w-28 p-3 px-6 pt-2 text-white text-center
         bg-slate-700 text-white rounded-full baseline rfont">
                        {{ auth()->user()->name }}
                    </a>
                </div>

                <div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" href="{{ route('logout') }}" class="hidden md:block w-28 p-3 px-6 pt-2 text-white text-center
         bg-white text-slate-700 border border-slate-700 rounded-full baseline rfont">
                            {{ "خروج" }}
                        </button>
                    </form>
                </div>
            </div>
        @endif

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
            <a href="/dashboard" class="hover:text-gray-700">داشبورد</a>
            <a href="/requests" class="hover:text-gray-700">درخواست جدید</a>
            <a href="/users" class="hover:text-gray-700">سابقه درخواست های من</a>

        </div>
    </div>
</div>
