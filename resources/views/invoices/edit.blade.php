<x-layout>
    @php
        @endphp

    <p class="font-bold text-center mt-7">سفارش شما با کد پیگیری {{ $invoice->code }} در سامانه ثبت شد.</p>
    <div class="flex flex-col gap-3 mx-auto bg-gray-300 w-96 p-3
                rounded-xl mt-3 border border-t-4 border-t-slate-700
                shadow-2xl">
        <div>
            <div class="flex justify-between">
                <div>

                </div>
                <div>
                    <form action="/invoices/{{ $invoice->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded-xl">
                            لغو سفارش
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <form action="/invoices/{{ $invoice->id }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" value="{{ $invoice->id }}" name="id">

            {{--        name --}}
            <div class="flex justify-between">
                <div>
                    <p>نام و نام خانوادگی</p>
                </div>
                <div>
                    <input type="text" name="name" value="{{ $invoice->name }}"
                           class="p-1 w-48 rounded focus:outline-none">
                </div>
                @error('name')
                <p class="text-xs text-red-500 my-2 mx-1">
                    {{ $message }}
                </p>
                @enderror

            </div>
            {{--        phone--}}
            <div class="flex justify-between border-t p-1 border-t-slate-700">
                <div>
                    <p>شماره تماس</p>
                </div>
                <div>
                    <input type="text" name="phone" value="{{ $invoice->phone }}"
                           class="p-1 w-48 rounded focus:outline-none">
                </div>
            </div>
            <div class="text-center">
                @error('phone')
                <p class="text-xs text-red-500 my-2 mx-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{--        service name --}}
            <div class="flex justify-between border-t p-1 border-t-slate-700">
                <div>
                    <p>نام سرویس</p>
                </div>
                <div>
                    <select name="service_id" id="service" class="w-24 rounded-2xl w-48">
                        @foreach($services as $service)
                            <option
                                class="w-48"
                                {{ $invoice->service->id == $service->id ? 'selected' : '' }}
                                value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center">
                @error('service_id')
                <p class="text-xs text-red-500 my-2 mx-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{--        start time --}}
            <div class=" flex justify-between border-t p-1 border-t-slate-700">
                <div>
                    <p>زمان مراجعه</p>
                </div>
                <div>
                    <input type="text" name="start_time" value="{{ $invoice->start_time }}"
                           class="p-1 w-48 rounded focus:outline-none">
                </div>
            </div>
            <div class="text-center">
                @error('start_time')
                <p class="text-xs text-red-500 my-2 mx-1">
                    {{ $message }}
                </p>
                @enderror
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
                    <input min="{{  date('Y-m-d') }}" type="date" name="date" value="{{ $invoice->date }}"
                           class="p-1 w-48 rounded focus:outline-none">
                </div>
            </div>
            <div class="text-center">
                @error('date')
                <p class="text-xs text-red-500 my-2 mx-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            {{--        price--}}
            <div class="flex justify-between border-t p-1 border-t-slate-700">
                <div>
                    <p>هزینه قابل پرداخت</p>
                </div>

                <div>
                    <p>{{ $invoice->service->cost }} تومان</p>
                </div>
            </div>

            @if (strtotime(date('Y:m:d')) < strtotime($invoice->date))
                <div class="w-96 text-center mt-6 mx-auto">
                    <a href="/track-order">
                        <button class="bg-slate-700 text-white px-4 py-2 rounded-xl hover:bg-slate-600 transition">
                            ذخیره تغییرات
                        </button>
                    </a>
                </div>
            @endif
        </form>
    </div>


</x-layout>