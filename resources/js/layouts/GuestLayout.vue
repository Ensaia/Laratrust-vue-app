<template>
    <main class="max-w-screen-md container p-5 m-auto py-8 px-8 flex flex-col items-center justify-center">
        <div>
            <guest-navbar></guest-navbar>
        </div>
        <div>
            <slot></slot>
        </div>
    </main>
</template>

<script>
    import {ref, defineComponent} from 'vue'
    import GuestNavbar from "@/components/GuestNavbar.vue"

    export default defineComponent({
        name: 'GuestLayout',
        components: {
            GuestNavbar
        },
        setup(props, context) {
            return {}
        }
    })
</script>

<style scoped>

</style>
