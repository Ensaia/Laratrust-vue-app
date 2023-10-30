<template>
    <div class="p-5 xl:px-0">
         <div class="flex md:flex-row py-5">
            <div>
<!--                <router-link :to="{name : 'UserRoleAttach'}"-->
<!--                   class="btn btn-success px-2">-->
<!--                    <span class=""> إضافة ادوار للمستخدمين</span>-->
<!--                    <span><i class="fa-solid fa-plus-square fa-lg"></i></span>-->
<!--                </router-link>-->
            </div>
            <div>
<!--                <router-link :to="{ name : 'UserPermissionAttach'}"-->
<!--                   class="btn btn-success px-2 mr-2">-->
<!--                    <span> إضافة اذونات للمستخدمين</span>-->
<!--                    <span><i class="fa-solid fa-plus-square fa-lg"></i></span>-->
<!--                </router-link>-->
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-md text-gray-500 dark:text-gray-400 border text-center">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border">
                <tr class="">
                    <th scope="col" class="px-6 py-3 border">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        اسم المستخدم
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        البريد الآلكتروني
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        صلاحيات المستخدم
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        اﻷدوار
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        اﻷذونات
                    </th>

                    <th scope="col" class="px-6 py-3 border" colspan="2">
                        العمليات
                    </th>
                </tr>
                </thead>
                <tbody>
               <template v-for="user in users" :key="user.id">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 border w-10">
                            {{ user.id }}
                        </td>
                        <td class="px-6 py-4 border">
                            {{ user.name }}
                        </td>
                        <td class="px-6 py-4 border">
                            {{ user.email }}
                        </td>
                        <td class="px-6 py-4 border">
                            <div class="md:flex md:flex-row justify-center">
                            <template v-for="role in user.user_roles">
                                <div>
                            <span class="mr-2 px-4 py-5 badge badge-success">{{ role }}</span>
                        </div>
                        </template>
                            </div>
                        </td>
                        <td class="px-6 py-6 border">
<!--                            <router-link :to="{name : 'UserRolesIndex' , params: { id: user.id } } " class="link">-->
<!--                                <span> اﻷدوار</span>-->
<!--                            </router-link>-->
                        </td>
                        <td class="px-6 py-4 border">
<!--                            <router-link :to="{name : 'UserPermissionsIndex' , params : { id : user.id} }" class="link">-->
<!--                                <span> اﻷذونات</span>-->
<!--                            </router-link>-->
                        </td>
                       <!-- actions -->
                        <td class="px-6 py-2 w-10 border">
                            <form action="" method="post" id="delete-user-form-{{ user.id }}">
                                <button data-user-id="{{ user.id }}"
                                type="button"
                                    class="delete-user-button btn btn-error">
                                    <span><i class="fa-solid fa-trash fa-lg"></i></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { defineComponent , ref, onMounted, computed } from 'vue'
import { useAuthStore } from '@/stores'
import axios from 'axios'
export default defineComponent({
    name:'UsersIndex',

    setup(props, context){
        const authStore = useAuthStore();
        const users = ref({})
        // const getUsers = computed(() => {
        //     return authStore.getUsers;
        // });
        // const users = computed(() => {
        //     return authStore.users;
        // });

        const getAllUsers = async () => {
            const response = await axios.get('/api/auth/users/?page=1')
            .then((response) => {
                users.value = response.data.data
            })
            .catch((error) => {
                console.log(error)
            })
        }

        onMounted(() => {
            getAllUsers()
        });

        return {
            users
        }
    }
})
</script>
