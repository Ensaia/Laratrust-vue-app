<template>
    <div class="flex flex-col md:flex-row" x-data="{ isSidebarOpen : true}" v-if="authStore.user && authStore.user.hasOwnProperty('id')">
        <Sidebar />
        <div class="w-full md:flex-1">
            <Header />
            <main>
                <div class="px-8 py-6">
                    <router-view></router-view>
                </div>
            </main>
        </div>
    </div>
<!--    <template v-else>-->
<!--        <main>-->
<!--            <router-view></router-view>-->
<!--        </main>-->
<!--    </template>-->
</template>

<script>

    import {ref, defineComponent} from 'vue'
    import {useAuthStore} from "@/stores";
    import Header from "@/components/Header.vue"
    import Sidebar from "@/components/Sidebar.vue"
    export default defineComponent({
        name: 'AuthenticatedLayout',
        components:{
            Header,
            Sidebar
        },
        setup(props, context) {
            const authStore = useAuthStore()
            return {authStore}
        }
    })

</script>

<style scoped>

</style>