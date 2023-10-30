<template>
    <guest-layout>
        <div class="mx-auto container flex flex-col items-center justify-center ">
<!--                <guest-navbar></guest-navbar>-->
            <div class="mb-2 pb-4">
          <span class="mb-2 text-4xl font-bold text-black">
            Laravel Vue SPA Auth
          </span>
            </div>
            <div class="">
                <figure class="max-w-lg">
                    <img class="h-auto max-w-full rounded-lg" src="@/assets/images/laratrust.png"
                         alt="image description">
                    <!-- <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">LARAVEL LARATRUST VUE AUTH APP</figcaption> -->
                </figure>
            </div>
        </div>
    </guest-layout>
</template>

<script>
    import {defineComponent} from 'vue'
    import GuestLayout from '@/layouts/GuestLayout.vue'
    import GuestNavbar from '@/components/GuestNavbar.vue'

    export default defineComponent({
        name: "GuestIndex",
        components: {
            GuestLayout,
            GuestNavbar
        },
    })
</script>

<style scoped>

</style>
