<x-layout>
    @php date_default_timezone_set('Iran'); @endphp
    {{--    {{ $users[0]->invoices_sum_cost }}--}}
    <x-admin-navbar/>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="w-11/12 flex lg:flex-row flex-col gap-3 justify-center mt-5 bg-gray-700 p-5 mx-auto shadow-2xl rounded">


        <div class="lg:w-4/5 w-full p-5 mx-auto bg-white rounded-2xl pt-8 shadow shadow-blue-100">
            <p>تعداد کاربران : {{ $users->count() }}</p>
            @forelse($users as $user)
                <div class="bg-slate-700 m-3 p-3 rounded-xl text-white flex justify-between border-2 border-white">
                    <input type="hidden" id="user_{{ $user->id }}" value="{{ $user->id }}">
                    <a href="/requests/{{ $user->id }}">
                        <div
                            id="show_user_{{ $user->id }}"
                            class="hover:bg-gray-600 p-3 rounded-xl cursor-pointer">
                            <p>نام : {{ $user->name }}</p>
                            <p>شماره تماس : {{ $user->phone }}</p>
                            <p>زمان عضویت : {{ $user->created_at->diffForHumans() }}</p>
                            <p>ایمیل : {{ $user->email }}</p>
                        </div>
                    </a>

                    <div>
                        <p>جمع پرداخت های کاربر : {{ $user->invoices_sum_cost }}</p>
                    </div>


                    <div>
                        <p> تاریخ اخرین استفاده از خدمات
                            : {{ $user->invoices->first()->date }}</p>
                        <p> ثبت اخرین درخواست :
                            : {{ $user->invoices->first()->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        <p>میزان فعالیت در سه ماه گذشته </p>
                        <div class="bg-{{$user->activity}}-500
                        w-12 h-12 bg-white mx-auto mt-2 rounded flex items-center justify-center">
                            <p class="text-black">{{ $user->activityCount }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center mt-5">کاربری یافت نشد :(</p>
            @endforelse

        </div>


    </div>


    <script>


    </script>
    <div style="height: 400px">
    </div>
</x-layout>
