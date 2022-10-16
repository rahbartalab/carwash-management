<x-layout>

    <form action="/invoices" method="post">
        @csrf
        <section class="h-full gradient-form bg-gray-200 md:h-screen mt-5 mb-80">
            <div class="container py-12 px-6 h-full">
                <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                    <div class="xl:w-10/12">
                        <div class="block bg-white shadow-lg rounded-lg">
                            <div class="lg:flex lg:flex-wrap g-0">
                                <div class="lg:w-6/12 px-4 md:px-0">
                                    <div class="md:p-12 md:mx-6">
                                        <div class="text-center">
                                            <img
                                                class="mx-auto w-48"
                                                src="/static/images/logo.png"
                                                alt="logo"
                                            />
                                            <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">به کارشور خوش آمدید</h4>
                                        </div>
                                        <form>
                                            <p class="mb-4">اطلاعات زیر را با دقت کامل کنید</p>
                                            <div class="mb-4">
                                                <label class="mb-2 block" for="name">نام و نام خانوادگی</label>
                                                <input
                                                    type="text"
                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    id="name"
                                                    placeholder="حداقل 2 حرف"
                                                    name="name"
                                                    value="{{ old('name') }}"
                                                />
                                                @error('name')
                                                <p class="text-xs text-red-500 my-2 mx-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <input
                                                    type="text"
                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    id="phone"
                                                    placeholder="شماره موبایل"
                                                    name="phone"
                                                    value="{{ old('phone') }}"
                                                />
                                                @error('phone')
                                                <p class="text-xs text-red-500 my-2 mx-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <select id="service_type"
                                                    name="service_type"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 outline-none focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option
                                                    {{ old('service_type') == '0' ? 'selected' : '' }} value="0"
                                                    selected>نوع سرویس دهی
                                                </option>
                                                <option
                                                    {{ old('service_type') == '1' ? 'selected' : '' }} value="1">
                                                    سریع ترین زمان ممکن
                                                </option>
                                                <option
                                                    {{ old('service_type') == '2' ? 'selected' : '' }} value="2">
                                                    انتخاب فردی
                                                </option>
                                            </select>

                                            {{--                                            TIME SECTION --}}

                                            <div id="time_section" class="hidden">
                                                <div class="mb-4">
                                                    <input
                                                        type="text"
                                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        id="name"
                                                        placeholder="زمان مراجعه مثال : 20:15"
                                                        name="start_time"
                                                        value="{{ old('start_time') }}"
                                                    />
                                                    @error('start_time')
                                                    <p class="text-xs text-red-500 my-2 mx-1">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <div
                                                        class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    </div>
                                                    <input type="date"
                                                           name="date"
                                                           min="{{  date('Y-m-d') }}"
                                                           class="bg-gray-50 border border-gray-300
                                                        text-gray-900 sm:text-sm rounded-lg mb-3
                                                        focus:ring-blue-500 focus:border-blue-500
                                                        block w-full pl-10 p-2.5 dark:bg-gray-700
                                                         dark:border-gray-600 dark:placeholder-gray-400
                                                         dark:text-white dark:focus:ring-blue-500
                                                          dark:focus:border-blue-500 focus:outline-none"
                                                           placeholder="Select date"
                                                           value="{{ old('date') }}"
                                                    >
                                                    @error('date')
                                                    <p class="text-xs text-red-500 my-2 mx-1">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="mb-4">
                                                <label class="mb-2 block" for="name">سرویس های مد نظر خود را انتخاب
                                                    کنید</label>
                                                @foreach($services as $service)
                                                    <div class="flex items-center mb-4 gap-2">
                                                        <input id="service_{{ $service->id }}"
                                                               type="checkbox"
                                                               value="{{ $service->id }}"
                                                               name="services[]"
                                                               class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300
                                                                focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800
                                                                 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                            {{ in_array($service->id , old('services') ?? []) ? 'checked' : '' }}
                                                        >
                                                        <label for="service_{{ $service->id }}"
                                                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $service->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('service_id')
                                            <p class="text-xs text-red-500 my-2 mx-1">
                                                {{ $message }}
                                            </p>
                                            @enderror


                                            <div class="text-center pt-1 mb-12 pb-1">
                                                <button

                                                    class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                                    type="submit"
                                                    data-mdb-ripple="true"
                                                    data-mdb-ripple-color="light"
                                                    id="submit_button"
                                                    style="
                        background: linear-gradient(
                          to right,
                          #D3D3D3,
                          #BDBDBD,
                          #9E9E9E,
                          #7D7D7D,
                          #696969
                        );
                      "
                                                >
                                                    ثبت سفارش
                                                </button>
                                            </div>
                                            <div class="flex items-center justify-between pb-6">
                                                <p class="mb-0 mr-2">می خواهید سفارش خود را پیگیری کنید ؟</p>
                                                <a href="/track-order">
                                                    <button
                                                        type="button"
                                                        class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                                        data-mdb-ripple="true"
                                                        data-mdb-ripple-color="light"
                                                    >
                                                        پیگیری
                                                    </button>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div
                                    class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                                    style="
                background: linear-gradient(
                    to right,
                     #D3D3D3,
                          #BDBDBD,
                          #9E9E9E,
                          #7D7D7D,
                          #696969);
              "
                                >
                                    <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                        <div>
                                            <img src="/static/images/register-man.jpg" alt="register-image"
                                                 class="mb-5">
                                        </div>
                                        <h4 class="text-xl font-semibold mb-6">درباره کارشور بیشتر بدانید</h4>
                                        <p class="text-sm">
                                            خشکشویی آنلاین شور واشور با هدف ارزش گذاری زمانی برای
                                            مشتریان خود در صدد هدفمندی زمان ومتعاقب آن صرفه جویی در هزینه ها(قیمت
                                            خشکشویی، سوخت، استهلاک خودرو)
                                            با بهترین کیفیت اقدام به راه اندازی سایت شور واشور نمود تا خدمتی در خور
                                            همشهریان عزیز یزدی ارائه دهد.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script>

        const serviceType = $('#service_type');
        const submitButton = $('#submit_button');
        const timeSection = $('#time_section');

        if (serviceType.val() === '0')
            $(submitButton).attr('disabled', 'disabled');

        $(serviceType).on('change', function () {
            if (serviceType.val() === '0') {
                if (!timeSection.hasClass('hidden')) {
                    timeSection.addClass('hidden');
                }
                submitButton.attr('disabled', 'disabled');
            } else {
                submitButton.removeAttr('disabled');
                if (serviceType.val() === '2') {
                    timeSection.removeClass('hidden');
                }
            }
            if (serviceType.val() === '1') {
                if (!timeSection.hasClass('hidden')) {
                    timeSection.addClass('hidden');
                }
            }
        });
    </script>
    <?php if (old('service_type') === '2'): ?>
    <script>timeSection.removeClass('hidden')</script>
    <?php endif; ?>

</x-layout>
