<template>
    <div class="pb-8 items-center justify-center">
        <ul class="menu menu-vertical lg:menu-horizontal bg-base-100 rounded-box ">
            <li>
                <router-link :to="{name : 'GuestIndex' }">
                    <span><i class="fa-solid fa-home"></i></span>
                    <span>الرئيسية</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{name : 'Login' }">
                    <span><i class="fa-solid fa-right-to-bracket"></i></span>
                    <span>تسجيل الدخول</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{name : 'Register' }">
                    <span><i class="fa-solid fa-user-plus"></i></span>
                    <span>إنشاء حساب</span>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "GuestNavbar"
    }
</script>

<style scoped>

</style>