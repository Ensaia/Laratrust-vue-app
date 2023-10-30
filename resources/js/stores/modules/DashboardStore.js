import {defineStore} from 'pinia'
import DashboardService from '@/services/DashboardService'

// In Setup Stores:
  // ref()s become state properties
  // computed()s become getters
  // function()s become actions
export const useDashboardStore = defineStore("DashboardStore", {

    state: () => ({
        countUsers:  null,
        countRoles: null,
        countPermissions:  null,
        countPosts : null,
      }),

    actions:{
      async getDataCounts(){
        const dashboardService = new DashboardService()
        try {
          const response = await dashboardService.getDataCounts()
          this.countUsers = response.data.data.count_users
          this.countRoles = response.data.data.count_roles
          this.countPermissions = response.data.data.count_permissions
        } catch (error) {
          console.log(error)
        }
      }
    },
    getters:{
      getCountUsers(state){
        return state.countUsers
      }
    },
})
