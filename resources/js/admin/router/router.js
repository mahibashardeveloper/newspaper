import {createRouter, createWebHistory} from "vue-router";

// auth

import login from "../components/auth/login.vue";

import forget from "../components/auth/forget.vue";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// dashboard

import dashboard from "../components/dashboard/dashboard.vue";

// category

import category from "../components/category/category.vue";

// blog

import blog from "../components/blog/blog.vue";

// customer

import customer from "../components/customer/customer.vue";

// profile

import profile from "../components/profile/profile.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/admin";

// route ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

    // authentication

    {path: ROOT_URL + '/auth/login', name: 'login', component: login, meta: {title: 'login'}},

    {path: ROOT_URL + '/auth/forget', name: 'forget', component: forget, meta: {title: 'forget'}},

    // layout

    {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // dashboard

            {path: ROOT_URL + '/dashboard', name: 'dashboard', component: dashboard, meta: {title: 'dashboard'}},

            // category

            {path: ROOT_URL + '/categories', name: 'category', component: category, meta: {title: 'categories'}},

            // blog

            {path: ROOT_URL + '/blogs', name: 'blog', component: blog, meta: {title: 'blogs'}},

            // customer

            {path: ROOT_URL + '/customers', name: 'customer', component: customer, meta: {title: 'customers'}},

            // profile

            {path: ROOT_URL + '/profile', name: 'profile', component: profile, meta: {title: 'profile'}},

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
