<template>
<guest-layout>
  <div class="my2 mb-4 flex flex-col px-8 pb-8 pt-6 bg-white border rounded-lg shadow">
    <h2 class="mb-4 text-xl font-bold text-center">إستعادة كلمة المرور</h2>
      <form @submit.prevent="sendForgotPasswordEmail">
        <div class="-mx-3 mb-6 md:flex">
          <div class="px-3 md:w-full">
            <label for="email" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">البريد اﻵلكتروني</label>
            <input type="email" class="input input-bordered w-full" v-model="formData.email"/>
            <!-- <ValidationErrors v-if="errors.email" :errorsObject="errors.email" /> -->
          </div>
        </div>
        <div class="-mx-3 mb-6 md:flex">
          <div class="px-3 md:w-full">
            <button class="btn btn-neutral md:w-full" type="submit">إستعادة كلمة المرور</button>
          </div>
        </div>
        <div class="-mx-3 mb-6 md:flex justify-end">
          <div class="md:w-full">
            إذا كان لديك حساب يمكنك تسجيل الدخول
            <router-link :to="{name : 'Login'}" class="link link-primary">هنا</router-link>
          </div>
        </div>
      </form>
    </div>
</guest-layout>
</template>

<script>

import AuthService from "@/services/AuthService";
import GuestLayout from "@/layouts/GuestLayout.vue";
// import ValidationErrors from "@/components/ValidationErrors.vue";
import {reactive,ref} from 'vue'
export default {
  name: "ForgotPassword",
  components: {
    GuestLayout,
  },
    setup(props,context){
      const errors = ref({})
      const formData = reactive({
          email:null
      })
        const sendForgotPasswordEmail = async () =>{
            try{
                await AuthService.forgotPassword(formData)
                swal({
                    toast: true,
                    icon: 'success',
                    title: 'تمت عملية ارسال البريد اﻵلكتروني الخاص برابط استعادة كلمة المرور',
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', swal.stopTimer)
                        toast.addEventListener('mouseleave', swal.resumeTimer)
                    }
                    /*
                    Popup window position, can be 'top', 'top-start',
                     'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'.
                    */
                })
            }catch(error){
                errors.value = error.response.data.errors || {}
                console.log(errors.value)
            }
        }
      return{errors,formData,sendForgotPasswordEmail}
    }
};
</script>
