<div class="mb-4 flex flex-col px-8 pb-8 pt-6 bg-white border rounded-lg shadow">
            <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')
            <div class="-mx-3 mb-6 md:flex">
                <div class="px-3 md:w-full">
                    <label for="current-password"
                           class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('كلمة
                        المرور الحالية') }}</label>
                    <input type="password" name="current_password" required autocomplete="current-password"
                    class="w-full px-3 py-2 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline focus:border-blue-300" />
                    
                </div>
            </div>
            <div class="-mx-3 mb-6 md:flex">
                <div class="mb-6 px-3 md:mb-0 md:w-1/2">
                    <label for="new-password"
                           class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('كلمة المرور الجديدة') }}</label>
                   <input type="password" name="password" required autocomplete="new-password"
                    class="w-full px-3 py-2 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline focus:border-blue-300" />
                </div>
                <div class="mb-6 px-3 md:mb-0 md:w-1/2">
                    <label for="confirm-new-password"
                           class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">{{ __('تأكيد
                        كلمة المرور') }}</label>
   <input type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full px-3 py-2 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline focus:border-blue-300" />
                </div>
            </div>
            <div class="-mx-3 md:flex">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <button class="w-full text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">
                        {{ __('تحديث كلمة المرور') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
  