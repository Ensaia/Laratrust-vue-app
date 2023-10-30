<template>
<guest-layout>
        <div class="my2 mb-4 flex flex-col px-8 pb-8 pt-6 bg-white border rounded-lg shadow">
        <h2 class="mb-4 text-xl font-bold text-center">تسجيل الدخول</h2>
            <form @submit.prevent="loginUser">
                <div class="-mx-3 mb-6 md:flex">
                    <div class="px-3 md:w-full">
                        <label for="email"
                               class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">البريد
                            اﻵلكتروني</label>
                        <input type="email" class="input input-bordered w-full" v-model="formData.email"/>
                    </div>
                </div>
                <div class="-mx-3 mb-6 md:flex">
                    <div class="mb-6 px-3 md:mb-0 md:w-full">
                        <label for="password"
                               class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2">كلمة
                            المرور</label>
                        <input type="password" class="input input-bordered w-full" v-model="formData.password"/>
                    </div>
                </div>
                <div class="-mx-3 mb-6 md:flex">
                    <div class="px-3 md:w-full">
                        <button class="btn btn-neutral md:w-full" type="submit">تسجيل الدخول</button>
                    </div>
                </div>
            </form>
            <div class="-mx-3 mb-6 md:flex justify-between">
                <div class="mb-6 px-3 md:mb-0">
                    هل نسيت كلمة المرور ؟ يمكنك استعادتها من
                    <router-link :to="{name : 'ForgotPassword'}"
                                 class="link link-primary">هنا
                    </router-link>
                </div>
                <div class="mb-6 px-3 md:mb-0">
                    هل لديك حساب ؟ قم بإنشاء حسابك من
                    <router-link :to="{name : 'Register'}" class="link link-primary">
                        هنا
                    </router-link>
                </div>
            </div>
            <div class="-mx-3 mb-6 md:flex justify-between">
                <div class="mb-6 px-3 md:mb-0">
                    <span class="font-mono font-semibold text-lg"><code>Password : 12345678</code></span>
                </div>
                <div class="mb-6 px-3 md:mb-0">
                    <span class="font-mono font-semibold text-lg"><code>E-mail : mohammed@admin.com</code></span>
                </div>
            </div>
        </div>
</guest-layout>
</template>

<script>

    import {ref, reactive, computed, onMounted} from 'vue'
    import GuestLayout from "@/layouts/GuestLayout.vue"
    import GuestNavbar from "@/components/GuestNavbar.vue"
    import AuthService from "@/services/AuthService"
    import  {useAuthStore}  from '@/stores';
    export default {
        name: "Login",
        components:{
            GuestLayout,
            GuestNavbar
        },
        setup(props, context) {
              const authStore = useAuthStore();
            const formData = reactive({
                email: 'mohammed@admin.com',
                password: '12345678',
            })
            const loginUser = async () => {
                authStore.login(formData);
            }
            return {formData, loginUser}
        }
    };
</script>
