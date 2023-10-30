<template>
    <aside class="w-full md:w-64 bg-gray-800 md:min-h-screen" x-data="{ isMobileMenuOpen: false }" x-bind:class="{ 'md:-mr-64' : isSidebarOpen == false}">
        <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
            <router-link :to="{ name : 'DashboardIndex' }" class="flex items-center">
                <img src="@/assets/images/auth.png" alt="Logo" class="w-12 h-12 items-center"/>
                <span class="text-gray-300 text-xl font-semibold mx-2">{{ appName }}</span>
            </router-link>
            <div class="flex md:hidden">
                <button type="button" x-on:click="isMobileMenuOpen = !isMobileMenuOpen" onClick="toggleClass('#mobileMenuIcon','fa-bars','fa-xmark')"
                        class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                    <span class="w-8"><i class="fa-solid fa-bars fa-lg" id="mobileMenuIcon"></i></span>
                </button>
            </div>
        </div>
        <div class="px-2 py-6 md:block" x-bind:class="isMobileMenuOpen? 'block': 'hidden'" >
            <ul>
                <li class="px-2 py-3 bg-gray-900 rounded">
                    <router-link :to="{ name : 'DashboardIndex' }" class="flex items-center">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-gauge"></i></span>
                        <span class="mx-2 text-gray-300">لوحة التحكم</span>
                    </router-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <router-link :to="{ name : 'UsersIndex' }" class="flex items-center">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-users"></i></span>
                        <span class="mx-2 text-gray-300">المستخدمون</span>
                    </router-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="" class="flex items-center">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-book-open"></i></span>
                        <span class="mx-2 text-gray-300">المنشورات</span>
                    </a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="" class="flex items-center">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-users-gear"></i></span>
                        <span class="mx-2 text-gray-300">اﻷذونات</span>
                    </a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="" class="flex items-center">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-users-cog"></i></span>
                        <span class="mx-2 text-gray-300">اﻷدوار</span>
                    </a>
                </li>
            </ul>
            <div class="border-t border-gray-700 -mx-2 mt-2 md:hidden"></div>
            <ul class="mt-6 md:hidden">
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="" class="mx-2 text-gray-300">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-user"></i></span>
                        <span class="mx-2 text-gray-300">الملف الشخصي</span>
                    </a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <button class="mx-2 text-gray-300" v-on:click="onLogout">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-sign-out-alt"></i></span>
                        <span class="mx-2 text-gray-300">تسجيل الخروج</span>
                    </button>
                </li>
            </ul>
        </div>
    </aside>

</template>

<script>
    import { ref,defineComponent , computed } from 'vue'
    import { useAuthStore } from '@/stores'
    export default defineComponent({
        name : 'Sidebar',
        setup(props,context){
          const authStore = useAuthStore()
          const appName = computed(() => {
              return 'LARATRUST-APP-VUE'
              return process.env.APP_NAME
          })
          const onLogout = () => {
              authStore.logout()
          }
            return {appName,onLogout}
        }
    })
</script>
