import './bootstrap';
import {createApp} from 'vue'
import {createPinia} from "pinia";
import Alpine from 'alpinejs'
import 'flowbite'
import router from '@/router'
import swal from 'sweetalert2';

window.Alpine = Alpine
window.Swal = swal;
Alpine.start()

import App from '@/App.vue'
const pinia = createPinia()


const VueApp = createApp(App)
VueApp.use(router)
VueApp.use(pinia)
VueApp.mount('#app')
