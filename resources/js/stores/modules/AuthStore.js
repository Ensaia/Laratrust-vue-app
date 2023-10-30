import {defineStore} from 'pinia'
import AuthService from '@/services/AuthService'
import {useAlertStore} from "@/stores";
import router from "@/router"
import {getResponseError} from '@/helpers/api'

export const useAuthStore = defineStore("AuthStore", {
    state: () => {
        return {
            isAuthenticated: false,
            user: null,
            userRoles: null,
            error: null,
        };
    },

    actions: {
        async login(payload) {
            const authService = new AuthService()
            const alertStore = useAlertStore()
            try {
                const response = await authService.login(payload)
                this.isAuthenticated = true
                await this.getCurrentUser()
                this.setBrowserData()
                // this.user = response.data.user
                // console.log(response.data)
                alertStore.clear()
                await router.push({name : 'DashboardIndex'})
            } catch (error) {
                this.isAuthenticated = false
                this.error = alertStore.error(getResponseError(error))
            }
        },
        async registerUser(payload) {
            const authService = new AuthService()
            const alertStore = useAlertStore();
            try {
                const response = await authService.registerUser(payload)
                await router.push({name : 'DashboardIndex'})
                alertStore.clear()
            } catch (error) {
                alertStore.error(getResponseError(error));
            }
        },
        async getCurrentUser() {
            const authService = new AuthService()
            const alertStore = useAlertStore()
            try {
                const response = await authService.getCurrentUser()
                this.user = response.data.data
                this.userRoles = response.data.data.user_roles
            } catch (error) {
                this.user = null
                alertStore.error(getResponseError(error))
            }
            return this.user
        },

        logout() {
            return new Promise((resolve, reject) => {
                const authService = new AuthService()
                const alertStore = useAlertStore()
                return authService.logout()
                    .then((response) => {
                        this.clearBrowserData()
                        this.user = null
                        this.isAuthenticated = false
                        if (router.currentRoute.name !== 'Login') {
                            router.push({name: 'Login'})
                            console.log('logout...')
                        }
                        resolve(response)
                    })
                    .catch((error) => {
                        alertStore.error(getResponseError(error));
                        reject(error)
                    })
            })
        },

        hasBrowserData(){
            let data = window.localStorage.getItem('currentUser')
            return !!data;
        },
        setBrowserData(){
            window.localStorage.setItem('currentUser', JSON.stringify(this.user))
        },
        clearBrowserData(){
            window.localStorage.removeItem('currentUser')
        },
    },

    getters: {
        // getUser: (state) => {
        //     return !!state.user;
        // },
        // getIsAuthenticated(state){
        //     return !!state.isAuthenticated
        // },
        getLoggedIn(state){
            return !!state.user
        },
        // getRoles(state){
        //     return state.user.user_roles ? state.user.user_roles : false 
        // },
        getIsGuest(state){
            return !state.hasBrowserData()
        },
        // getLoading(state) {
        //     return state.loading;
        // },
        // getError(state) {
        //     return state.error;
        // },

    },
});
