<template>
  <guest-layout>
          <div class="my2 mb-4 flex flex-col px-8 pb-8 pt-6 bg-white border rounded-lg shadow">
          <show-alerts></show-alerts>
          <h2 class="mb-4 text-xl font-bold text-center">إنشاء حساب</h2>
              <form @submit.prevent="registerUser">
                  <div class="-mx-3 mb-6 md:flex ">
                      <div class="px-3 md:w-full">
                          <label for="name" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">اسم
                              المستخدم</label>
                          <input type="text" class="input input-bordered w-full"

                                 v-model="formData.name"/>
                          <!-- v-bind:class="{ ['border-red-500']: erros }" -->
                      </div>
                  </div>
                  <div class="-mx-3 mb-6 md:flex">
                      <div class="px-3 md:w-full">
                          <label for="email"
                                 class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">البريد
                              اﻵلكتروني</label>
                          <input type="text" class="input input-bordered w-full" v-model="formData.email"/>
                      </div>
                  </div>
                  <div class="-mx-3 mb-6 md:flex">
                      <div class="mb-6 px-3 md:mb-0 md:w-1/2">
                          <label for="password"
                                 class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">كلمة
                              المرور</label>
                          <input type="password" class="input input-bordered w-full" v-model="formData.password"/>
                      </div>
                      <div class="mb-6 px-3 md:mb-0 md:w-1/2">
                          <label for="password-confirmation"
                                 class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">تأكيد كلمة
                              المرور</label>
                          <input type="password" class="input input-bordered w-full"
                                 v-model="formData.password_confirmation"/>
                      </div>
                  </div>
                  <div class="-mx-3 mb-6 md:flex">
                      <div class="px-3 md:w-full">
                          <button class="btn btn-neutral md:w-full sm:w-full" type="submit">إنشاء حساب</button>
                      </div>
                  </div>
                  <div class="-mx-3 mb-6 md:flex justify-end">
                      <div class="md:w-full">
                          إذا كان لديك حساب يمكنك تسجيل الدخول
                          <router-link :to="{ name: 'Login' }" class="link link-primary">هنا</router-link>
                      </div>
                  </div>
              </form>
          </div>
  </guest-layout>
</template>

<script>


    import {reactive, ref, inject} from 'vue'
    import {useAuthStore}  from '@/stores';
    import ShowAlerts from "@/components/ShowAlerts.vue";
    import GuestLayout from "@/layouts/GuestLayout.vue"
    export default {
        name: "Register",
        components: {
        ShowAlerts,
            GuestLayout

    },
        setup(props, context) {
          const authStore = useAuthStore()
            const formData = reactive({
                // name: null,
                // email: null,
                password: null,
                password_confirmation: null,

                name: 'mohammed',
                email: 'mohammed@laravel.com',
                // password: '12345678',
                // password_confirmation: '12345678',
            })
            const registerUser = async () => {
               authStore.registerUser()
            }

            return {formData, registerUser}
        }
    };

      /* getErrorMessage
                    Popup window position, can be 'top', 'top-start',
                     'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'.
                    */
</script>
