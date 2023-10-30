<x-layouts.auth>
    <x-alerts.errors />
    <x-alerts.status />

    <div class="mb-4 flex flex-col px-8 pb-8 pt-6">
        <form method="POST" action="{{ route('login') }}" class="">
            @csrf

            <div class="-mx-3 mb-6 md:flex">
            <div class="px-3 md:w-full">
                <label for="email" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('البريد الآلكتروني') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                    class="w-full px-3 py-2 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline focus:border-blue-300" />
            </div>
            </div>

            <div class="-mx-3 mb-6 md:flex">
            <div class="px-3 md:w-full">
                <label for="password" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('كلمة المرور') }}</label>
                <input type="password" name="password" required autocomplete="current-password"
                    class="w-full px-3 py-2 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline focus:border-blue-300" />
            </div>
            </div>
			<div class="-mx-3 mb-6 md:flex">
			 <div class="px-3 md:w-full">
                    <input type="checkbox" name="remember"
                        class="w-4 h-4 text-blue-500 transition duration-150 ease-in-out focus:outline-none focus:shadow-outline focus:border-blue-300">
                    <label for="remember_me" class="ml-2 text-gray-500 ">{{ __('تذكرني') }}</label>
                </div>
			</div>
            <div class="-mx-3 mb-6 md:flex">
               <div class="px-3 md:w-full">
               <button type="submit"
                    class="w-full text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    {{ __('تسجيل الدخول') }}
                </button>
               </div>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-blue-600 transition duration-150 ease-in-out hover:text-blue-400 focus:outline-none focus:underline">
                    {{ __('هل نسيت كلمة المرور ؟') }}
                </a>
                @endif
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="text-blue-600 transition duration-150 ease-in-out hover:text-blue-400 focus:outline-none focus:underline">
                    {{ __('هل لديك حساب ؟') }}
                </a>
                @endif
            </div>

        </form>
        <div class="-mx-3 mb-6 md:flex justify-between mt-5">
            <div class="mb-6 px-3 md:mb-0">
                <span class="font-mono font-semibold text-lg"><code>{{ __('Password : 12345678') }}</code></span>
            </div>
            <div class="mb-6 px-3 md:mb-0">
                <span class="font-mono font-semibold text-lg"><code>{{ __('E-mail : mohammed@admin.com') }}</code></span>
            </div>
        </div>
        <div class="-mx-3 mb-6 md:flex justify-between mt-5">
            <div class="mb-6 px-3 md:mb-0">
                <span class="font-mono font-semibold text-lg"><code>{{ __('Password : 12345678') }}</code></span>
            </div>
            <div class="mb-6 px-3 md:mb-0">
                <span class="font-mono font-semibold text-lg"><code>{{ __('E-mail : mohammed@laravel.com') }}</code></span>
            </div>
        </div>
    </div>
</x-layouts.auth>
