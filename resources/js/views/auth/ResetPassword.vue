<template>
 <guest-layout>
     <div class="my2 mb-4 flex flex-col px-8 pb-8 pt-6 bg-white border rounded-lg shadow">
         <h2 class="mb-4 text-xl font-bold text-center">إعادة تعيين كلمة المرور</h2>
             <form
                     @submit.prevent="resetPassword"
                     class=""
             >
                 <div class="-mx-3 mb-6 md:flex">
                     <div class="px-3 md:w-full">
                         <label for="email" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">البريد اﻵلكتروني</label>
                         <input type="email" class="input input-bordered w-full" v-model="formData.email"/>
                         <ValidationErrors v-if="errors.email" :errorsObject="errors.email" />
                     </div>
                 </div>
                 <div class="-mx-3 mb-6 md:flex">
                     <div class="mb-6 px-3 md:mb-0 md:w-full">
                         <label for="" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">كلمة المرور</label>
                         <input type="text" class="input input-bordered w-full" v-model="formData.password"/>
                         <ValidationErrors v-if="errors.password" :errorsObject="errors.password" />
                     </div>

                 </div>
                 <div class="-mx-3 mb-6 md:flex">
                     <div class="mb-6 px-3 md:mb-0 md:w-full">
                         <label for="" class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">تأكيد كلمة المرور</label>
                         <input type="text" class="input input-bordered w-full" v-model="formData.password_confirm"/>
                         <ValidationErrors v-if="errors.password_confirm" :errorsObject="errors.password_confirm" />
                     </div>
                 </div>
                 <button type="submit" class="btn btn-neutral w-full">
                     إعادة تعيين كلمة المرور
                 </button>
             </form>
         </div>
         <ValidationErrors v-if="errors.email" :errorsObject="errors.email" />
 </guest-layout>
</template>

<script>
import { getError } from "@/utils/helpers";
import AuthService from "@/services/AuthService";
import ValidationErrors from "@/components/ValidationErrors.vue";
import {reactive,ref,inject} from "vue";
import { useRoute } from 'vue-router'
import GuestLayout from "@/layouts/GuestLayout.vue";
export default {
  name: "ResetPassword",
  components: {
      ValidationErrors,
      GuestLayout
  },
  setup(props,context) {
     const errors = ref({})
        const route = useRoute()
        const swal = inject('$swal')
        const formData = reactive({
            email: null,
            password: null,
            password_confirmation: null,
            token: route.query.token,
        })
    const resetPassword = async () => {
        try {
            await AuthService.resetPassword(formData)
                   swal({
     toast: true,
     icon: 'success',
     title: 'تمت عملية تحديث البيانات بنجاح',
     position: 'top',
     showConfirmButton: false,
     timer: 3000,
     timerProgressBar: true,
     didOpen: (toast) => {
         toast.addEventListener('mouseenter', swal.stopTimer)
         toast.addEventListener('mouseleave', swal.resumeTimer)
     }

    /*
    Popup window position, can be 'top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'.
    */
 })
        }catch(error){

            if(error.response.status == 422){
              errors.value = error.response.data.errors || {}
            }
        }

    }
    return { errors , formData , resetPassword }
  }
};
// swal({
//     toast: true,
//     icon: 'success',
//     title: 'General Title',
//     position: 'top-right',
//     showConfirmButton: false,
//     timer: 3000,
//     timerProgressBar: true,
//     didOpen: (toast) => {
//         toast.addEventListener('mouseenter', swal.stopTimer)
//         toast.addEventListener('mouseleave', swal.resumeTimer)
//     }

    /*
    Popup window position, can be 'top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'.
    */
// });
</script>
