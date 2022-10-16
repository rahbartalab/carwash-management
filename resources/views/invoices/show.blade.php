<x-layout>

    <p class="font-bold text-center mt-7">سفارش شما با کد پیگیری {{ $invoice->code }} در سامانه ثبت شد.</p>
    <div class="flex flex-col gap-3 mx-auto bg-gray-300 w-96 p-3
                rounded-xl mt-3 border border-t-4 border-t-slate-700
                shadow-2xl">
        {{--        name --}}
        <div class="flex justify-between">
            <div>
                <p>نام و نام خانوادگی</p>
            </div>
            <div>
                <p>{{ $invoice->name }}</p>
            </div>
        </div>
        {{--        phone--}}
        <div class="flex justify-between border-t p-1 border-t-slate-700">
            <div>
                <p>شماره تماس</p>
            </div>
            <div>
                {{ $invoice->phone }}
            </div>
        </div>
        {{--        service name --}}

        @foreach($invoice->services as $service)

            <div class="flex justify-between border-t p-1 border-t-slate-700">
                <div>
                    <p>نام سرویس</p>
                </div>
                <div>
                    {{ $service->name }}
                </div>
            </div>

        @endforeach
        {{--        start time --}}
        <div class="flex justify-between border-t p-1 border-t-slate-700">
            <div>
                <p>زمان مراجعه</p>
            </div>
            <div>
                {{ $invoice->start_time }}
            </div>
        </div>
        {{--        end time --}}
        <div class="flex justify-between border-t p-1 border-t-slate-700">
            <div>
                <p>زمان اتمام</p>
            </div>
            <div>
                {{ $invoice->end_time }}
            </div>
        </div>
        {{--        date --}}
        <div class="flex justify-between border-t p-1 border-t-slate-700">
            <div>
                <p>تاریخ</p>
            </div>
            <div>
                {{ $invoice->date }}
            </div>
        </div>
        {{--        price--}}
        <div class="flex justify-between border-t p-1 border-t-slate-700">
            <div>
                <p>هزینه قابل پرداخت</p>
            </div>

            <div>
                <p>{{ $invoice->services->sum('cost') }} تومان</p>
            </div>
        </div>


    </div>

    @if(session('success'))
        <div class="w-96 text-center mt-6 mx-auto">
            <a href="/track-order">
                <button class="bg-slate-700 text-white px-4 py-2 rounded-xl hover:bg-slate-600 transition">
                    پیگیری سفارش
                </button>
            </a>
        </div>
    @endif

</x-layout>
