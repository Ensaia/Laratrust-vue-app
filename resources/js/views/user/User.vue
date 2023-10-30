<template>
  <div class="p-5 xl:px-0">
    {{ user }}
  </div>
</template>

<script>
import { defineComponent , ref, onMounted, computed } from 'vue'
import { useAuthStore } from '@/stores'
export default defineComponent({
  name:'user',
  setup(props, context){
      const authStore = useAuthStore()
      const user = computed(() => {
          return authStore.user;
      });
      onMounted(() => {
          authStore.getCurrentUser()
      })
      return { user}
  }
})
</script>

