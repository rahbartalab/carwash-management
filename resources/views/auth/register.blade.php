<x-layout>
    <x-navbar/>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div>
                <label for="name"> نام و نام خانوادگی </label>

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                              autofocus/>

                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <label for="email"> تلفن همراه </label>

                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                              required/>

                <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email"> ایمیل </label>

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required/>

                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password"> رمز عبور </label>

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation"> تکرار رمز عبور </label>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('قبلا ثبت نام کرده اید?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('ثبت نام') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-layout>
