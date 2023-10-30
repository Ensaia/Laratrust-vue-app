// layouts
import GuestLayout from '@/layouts/GuestLayout.vue';
// import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue';

import GuestIndex from '@/views/home/GuestIndex.vue'; // Import the Login component

import DashboardIndex from '@/views/dashboard/DashboardIndex.vue'; // Import the Login component
import UsersIndex from '@/views/user/UsersIndex.vue'; // Import the Login component
import User from '@/views/user/User.vue'; // Import the Login component
import Profile from '@/views/user/Profile.vue'; // Import the Login component

import Login from '@/views/auth/Login.vue'; // Import the Login component
import Register from '@/views/auth/Register.vue'; // Import the Register component
import ForgotPassword from '@/views/auth/ForgotPassword.vue'; // Import the Register component

/*
//
import RolesIndex from '@/views/role/RolesIndex.vue'; // Import the Register component
import RoleCreate from '@/views/role/RoleCreate.vue'; // Import the Register component
import RoleEdit from '@/views/role/RoleEdit.vue'; // Import the Register component
//
import PermissionsIndex from '@/views/permission/PermissionsIndex.vue'; // Import the Register component
import PermissionCreate from "@/views/permission/PermissionCreate.vue"; // Import the Register component
import PermissionEdit from "@/views/permission/PermissionEdit.vue"; // Import the Register component
//
import RolePermissionsIndex from "@/views/rolePermission/RolePermissionsIndex.vue"; // Import the Register component
import RolePermissionAttach from "@/views/rolePermission/RolePermissionAttach.vue"; // Import the Register component
//
import UserRolesIndex from "@/views/userRole/UserRolesIndex.vue"; // Import the Register component
import UserRoleAttach from "@/views/userRole/UserRoleAttach.vue"; // Import the Register component
//
import UserPermissionsIndex from "@/views/userPermission/UserPermissionsIndex.vue"; // Import the Register component
import UserPermissionAttach from "@/views/userPermission/UserPermissionAttach.vue"; // Import the Register component
*/

import NotFound from '@/views/helper/NotFound.vue'

const routes = [
    {
        path: "/", // Add this route
        name: "GuestIndex",
        component: GuestIndex,
        meta: {requiresAuth: false}
    },
    {
        path: "/login", // Add this route
        name: "Login",
        component: Login,
        meta: {requiresAuth: false},
    },
    {
        path: "/register", // Add this route
        name: "Register",
        component: Register,
        meta: {requiresAuth: false},
    },
    {
        path: "/forgot-password", // Add this route
        name: "ForgotPassword",
        component: ForgotPassword,
        meta: {requiresAuth: false},
    },
    {
        path:'/dashboard',
        name:'Dashboard',
        children :[
            {
                path: "home",
                name: "DashboardIndex",
                component: DashboardIndex,
                meta: {requiresAuth: true},
            },
            {
                path: "users",
                name: "UsersIndex",
                component: UsersIndex,
                meta: {requiresAuth: true, requiresRole: ['super-admin']},
            },
            {
                path: "user",
                name: "User",
                component: User,
                meta: {requiresAuth: true},
            },{
                path: "profile",
                name: "Profile",
                component: Profile,
                meta: {requiresAuth: true},
            },
        ],
    },
    /*

  {
    path: "/roles", // Add this route
    name: "RolesIndex",
    component: RolesIndex,
  },
  {
    path: "/role/create", // Add this route
    name: "RoleCreate",
    component: RoleCreate,
  },
  {
    path: "/role/edit/:id",
    name: "RoleEdit",
    component: RoleEdit,
    props: true,
  },
  {
    path: "/permissions", // Add this route
    name: "PermissionsIndex",
    component: PermissionsIndex,
  },
  {
    path: "/permission/create", // Add this route
    name: "PermissionCreate",
    component: PermissionCreate,
  },
  {
    path: "/permission/edit/:id",
    name: "PermissionEdit",
    component: PermissionEdit,
    props: true,
  },
  {
    path: "/role/:id/permission",
    name: "RolePermissionsIndex",
    component: RolePermissionsIndex,
    props: true,
  },
  {
    path: "/role/attach/permission",
    name: "RolePermissionAttach",
    component: RolePermissionAttach,
  },

  {
    path: "/user/:id/roles",
    name: "UserRolesIndex",
    component: UserRolesIndex,
    props: true,
  },
  {
    path: "/user/role/attach",
    name: "UserRoleAttach",
    component: UserRoleAttach,
  },
  {
    path: "/user/:id/permissions",
    name: "UserPermissionsIndex",
    component: UserPermissionsIndex,
    props: true,
  },
  {
    path: "/user/permission/attach",
    name: "UserPermissionAttach",
    component: UserPermissionAttach,
  },
  */
    {
        path: "/:catchAll(.*)",
        name: "notFound",
        meta: {requiresAuth: false},
        component: NotFound,
    },
];

export default routes
