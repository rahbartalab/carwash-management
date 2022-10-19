<x-layout>
    <x-admin-navbar/>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="w-11/12 flex lg:flex-row flex-col gap-3 justify-center mt-5 bg-gray-700 p-5 mx-auto shadow-2xl rounded">


        <div class="lg:w-1/3 w-full bg-white rounded-2xl h-72 px-5 py-10 shadow shadow-blue-100">
            <form action="/requests" method="GET">
                <div class="flex flex-col gap-3 bg-gray-200 rounded-xl p-3">
                    <div class="flex flex-col gap-3">
                        <h2 class="mx-auto">جستجو</h2>

                    </div>
                    <div>
                        <select class="w-full p-2 rounded-xl pr-12" name="service_id"
                                aria-label="Default select example">
                            <option selected value="">سرویس را انتخاب کنید</option>
                            @foreach ($services as $service) {
                            <option
                                {{ request('service_id') == $service->id ? 'selected' : '' }}
                                value=" {{ $service->id }} ">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-outline">
                        <label for=""></label>
                        <input
                            value="{{ request('date') }}"
                            type="date"
                            min="{{ date('Y-m-d') }}"
                            name="date" id="date" class="w-full rounded-xl"
                            aria-label="Search"/>
                    </div>

                    {{--                    <div>--}}
                    {{--                        <select class="form-select" name="specialty" aria-label="Default select example">--}}
                    {{--                            <option selected value="">تخصص را انتخاب کنید</option>--}}
                    {{--                            <?php foreach ($specialties as $specialty) { ?>--}}
                    {{--                            <option value="<?= $specialty['id'] ?>"><?= $specialty['name'] ?></option>--}}
                    {{--                            <?php } ?>--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}

                    <div class="flex justify-center">
                        <input type="submit"
                               class="btn btn-dark px-3 py-2 rounded-xl bg-slate-700 text-white"
                               value="جستجو">
                    </div>
                </div>
            </form>
        </div>


        <div class="lg:w-3/5 w-full p-5 bg-white rounded-2xl pt-8 shadow shadow-blue-100">
            <p>تعداد سفارش ها با فیلتر های مدنظر : {{ $invoices->count() }}</p>
            @forelse($invoices as $invoice)
                <div class="bg-slate-700 m-3 p-3 rounded-xl text-white flex justify-between border-2 border-white">
                    <div>
                        <p>نام درخواست دهنده : {{ $invoice->name }}</p>
                        <p>شماره تماس : {{ $invoice->phone }}</p>
                    </div>


                    <div>
                        <p>تاریخ مراجعه : {{ $invoice->date }}</p>
                        <p>زمان شروع : {{ $invoice->start_time }}</p>
                        <p>زمان پایان : {{ $invoice->end_time }}</p>
                    </div>
                    <div>
                        <p>سرویس ها :</p>
                        <ul>
                            @foreach($invoice->services as $service)
                                <li>{{ $service->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            @empty
                <p class="text-center mt-5">درخواستی یافت نشد :(</p>
            @endforelse

        </div>


    </div>

    <div style="height: 400px">
    </div>
</x-layout>
