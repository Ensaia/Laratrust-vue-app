<template>
    <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-16">
        <div class="">
            <ul class="flex">
                <li class="mr-6">
                    <button type="button" x-on:click="isSidebarOpen = !isSidebarOpen"
                            onClick="toggleClass('#SidebarIcon','fa-bars','fa-xmark')">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-bars fa-lg" id="SidebarIcon"></i></span>
                        <span class="sr-only">Expand / collapse sidebar</span>
                    </button>
                </li>
                <li class="mr-6">
                    <router-link :to="{ name : 'DashboardIndex' }" class="px-1 py-3 rounded hover:bg-gray-200 hover:text-black hover:font-semibold">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-home-alt"></i></span>
                        <span class="mx-2 text-black">لوحة التحكم</span>
                    </router-link>
                </li>
                <li class="mr-6">
                    <router-link :to="{ name : 'UsersIndex' }" class="px-1 py-3 rounded hover:bg-gray-200 hover:text-black hover:font-semibold">
                        <span class="w-6 text-gray-500"><i class="fa-solid fa-users"></i></span>
                        <span class="mx-2 text-black">المستخدمون</span>
                    </router-link>
                </li>

            </ul>
        </div>
        <!--        RIGHT NAV-->
        <div>
            <div class="flex flex-row">
                <!--                DROP DOWN-->
                <div class="relative inline-flex" x-data="{ openDropDownMenu: false }">
                    <button
                            class="inline-flex justify-center items-center group hover:bg-gray-200 hover:text-black hover:font-semibold px-3 py-3"
                            aria-haspopup="true"
                            x-on:click.prevent="openDropDownMenu = !openDropDownMenu"
                            x-bind:aria-expanded="openDropDownMenu"
                    >
                        <img class="w-8 h-8 rounded-full" src="@/assets/images/user.png" width="32" height="32" alt="Username"/>
                        <div class="flex items-center truncate">
                           <span class="truncate mr-2 text-sm font-medium dark:text-slate-300 group-hover:text-slate-800 dark:group-hover:text-slate-200">{{ authStore.user.name }}</span>
                            <span class=" mr-1 text-black" x-bind:class="{'rotate-180': openDropDownMenu}">
                            <i class="fa-solid fa-caret-down"></i>
                        </span>
                        </div>
                    </button>
                    <div
                            class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 {{align === 'right' ? 'right-0' : 'left-0'}}"
                            x-on:click.outside="openDropDownMenu = false"
                            x-on:keydown.escape.window="openDropDownMenu = false"
                            x-show="openDropDownMenu"
                            x-transition:enter="transition ease-out duration-200 transform"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-out duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            x-cloak
                    >
                        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200 dark:border-slate-700">
                           <div class="font-medium text-slate-800 dark:text-slate-100">{{ authStore.user.name }}</div>
                        </div>
                        <ul>
                            <li>
                                <router-link class="font-medium text-sm hover:bg-gray-200 hover:text-black hover:font-semibold flex items-center py-1 px-3"
                                   :to="{ name : 'Profile' }" x-on:click="openDropDownMenu = false"
                                   x-bind:focus="openDropDownMenu = true"  x-bind:focusout="openDropDownMenu = false">
                                    <span class="w-6 text-gray-500"><i class="fa-solid fa-user"></i></span>
                                    <span class="mx-2 text-black">الملف الشخصي</span>
                                </router-link>
                            </li>
                            <li>
                                    <a class="font-medium text-sm hover:bg-gray-200 hover:text-black hover:font-semibold flex items-center py-1 px-3"
                                       href="javascript:void(0)"
                                       v-on:click.prevent="onLogout"
                                       x-on:focus="openDropDownMenu = true"
                                       x-on:focusout="openDropDownMenu = false"
                                    >
                                        <span class="w-6 text-gray-500"><i class="fa-solid fa-sign-out-alt"></i></span>
                                        <span class="mx-2 text-black">تسجيل الخروج</span>
                                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    import {ref, defineComponent} from 'vue'
    import { useAuthStore } from '@/stores'
    export default defineComponent({
        name: 'Header',
        setup(props, context) {
            const authStore = useAuthStore()
            const align = ref('right')
            const onLogout = () => {
                authStore.logout()
            }
            return {align,onLogout,authStore}
        }
    })
</script>
