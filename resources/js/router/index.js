import {createRouter, createWebHistory} from 'vue-router';
import {useAuthStore} from '@/stores'
import routes from "@/router/routes";
const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes,
});

// router guard
router.beforeEach(async (to, from, next) => {
    console.log(`navigation to ${to.name} from ${from.name}`)
    const authStore = useAuthStore()
    // const userRoles = authStore.getRoles()
    // const isAuthenticated = authStore.getIsAuthenticated()
    const requiresRole = to.meta.requiresRole
    const requiresAuth = to.meta.requiresAuth

    // if(!authStore.user){
    //   authStore.clearBrowserData()
    // }

    if(requiresAuth && !authStore.user){
      next({name : 'Login'})
    }else{
      next()
    }
})

// router guard
// router.beforeEach(async (to, from, next) => {
//     console.log(`navigation to ${to.name} from ${from.name}`)
//     const authStore = useAuthStore()
//     let requiresRole = to.meta.requiresRole && !to.meta.requiresRole.includes(requiresRole) ? next({ name: 'DashboardIndex' , replace: true }) : next()
// })


// to: the target route location in a normalized format being navigated to.

// from: the current route location in a normalized format being navigated away from.

// next is actually a function and it’s very interesting.
// next has to be called in order to resolve our guard. So every logic path needs to hit next in some way.
// There are multiple ways to call next, but I want to point out three.
// next() sends you to the next set of logic. If there isn’t any, the navigation is confirmed and the user gets sent to to.
// next(false) this sends the user back to from and aborts their attempted navigation.
// next(<route>) this sends the user elsewhere, wherever you determine that is.


// console.log(`navigation to ${to.name} from ${from.name}`)

// const authStore = useAuthStore()
// const userRoles = authStore.getRoles()
// const isAuthenticated = authStore.getIsAuthenticated()
// const requiresRole = to.meta.requiresRole
// const requiresAuth = to.meta.requiresAuth

/*
router.beforeEach(async (to , from , next) => {
    console.log(`navigation to ${to.name} from ${from.name}`)
    console.log(`next ${next}`)

    const authStore = useAuthStore()
    const requiresAuth = to.meta.requiresAuth
    const requiresRole = to.meta.requiresRole

    if (!authStore.user) {
        await authStore.getCurrentUser();
    }


    if(requiresAuth && !authStore.getIsAuthenticated){
        authStore.clearBrowserData()
        next({name : 'Login'})
        // return
    }else if(requiresRole){
        if(authStore.getRoles.includes('super-admin')){
            next()
            // return
        }else{
            next({name : 'DashboardIndex'})
            // return
        }
    }
    console.log(`USER ROLE ${authStore.getRoles.includes('super-admin')}`)
    // if(to.meta.requiresAuth && !authStore.user){
    //     next({name : 'Login'})
    // }else{
    //     next()
    // }
})
*/

export default router;
