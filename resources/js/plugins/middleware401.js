import { useAuthStore } from '@/stores'

const middleware401 = async (error) => {
  const { status } = error.request
  if(status === 401 || status === 419){
    const authStore = useAuthStore()
    setTimeout(async () => await authStore.logout(),3000)
    return Promise.reject({
      name: 'Permission denied',
			message: 'You lost your credentials - will be redirected to login page.',
    })
  }
  console.log(error.request)
  return Promise.reject(error)
}

export default middleware401
