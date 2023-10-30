<template>
    <div>
        <code>{{ authStore.userRoles.includes('admin') }}</code>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-4 gap-4">

            <div class="flex items-start p-4 rounded-xl shadow-lg bg-white">
                <div class="flex items-center justify-center bg-orange-50 h-12 w-12 rounded-full border border-orange-100">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="mr-4">
                    <h2 class="font-semibold">المستخدمون  {{ countUsers }}</h2>
                    <p class="mt-2 text-sm text-gray-500">عدد المستخدمين الحاليين</p>
                </div>
            </div>
            <div class="flex items-start p-4 rounded-xl shadow-lg bg-white">
                <div class="flex items-center justify-center bg-indigo-50 h-12 w-12 rounded-full border border-indigo-100">
                    <i class="fa-solid fa-user-lock"></i>
                </div>

                <div class="mr-4">
                    <h2 class="font-semibold">الأدوار {{ countRoles }} </h2>
                    <p class="mt-2 text-sm text-gray-500">عدد الأدوار الحالية</p>
                </div>
            </div>
            <div class="flex items-start p-4 rounded-xl shadow-lg bg-white">
                <div class="flex items-center justify-center bg-indigo-50 h-12 w-12 rounded-full border border-indigo-100">
                    <i class="fa-solid fa-user-gear"></i>
                </div>

                <div class="mr-4">
                    <h2 class="font-semibold">الأذونات {{ countPermissions }} </h2>
                    <p class="mt-2 text-sm text-gray-500">عدد الأذونات الحالية </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {ref, defineComponent,computed , onMounted} from 'vue'
    import { useAuthStore } from '@/stores'
    import { useDashboardStore } from '@/stores'

    export default defineComponent({
        name: 'DashboardIndex',
        setup(props, context) {
            const authStore = useAuthStore()
            const dashboardStore = useDashboardStore()
            const isAuthenticatedUser = computed(() => {
              return authStore.user
            })
            const countUsers = computed(() => {
              return dashboardStore.countUsers
            })
            const countRoles = computed(() => {
              return dashboardStore.countRoles
            })
            const countPermissions = computed(() => {
              return dashboardStore.countPermissions
            })
            onMounted(() => {
              dashboardStore.getDataCounts()
            })
            return {authStore,countUsers,countRoles,countPermissions}
        }
    })
</script>
