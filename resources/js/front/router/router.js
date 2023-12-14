import {createRouter, createWebHistory} from "vue-router";

// auth

import register from "../components/auth/register.vue";

import login from "../components/auth/login.vue";

import forget from "../components/auth/forget.vue";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// home

import home from "../components/home/home.vue";

// profile

import profile from "../components/profile/profile.vue";

// details

import my_account from "../components/profile/subComponents/my_account.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/front/";

// route ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

    // layout

    {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // home

            {path: ROOT_URL + 'home', name: 'home', component: home, meta: {title: 'home'}},

            // authentication

            {path: ROOT_URL + 'auth/registration', name: 'registration', component: register, meta: {title: 'register'}},

            {path: ROOT_URL + 'auth/login', name: 'login', component: login, meta: {title: 'login'}},

            {path: ROOT_URL + 'auth/forget', name: 'forget', component: forget, meta: {title: 'forget'}},

            // profile

            {path: ROOT_URL + "profile", component: profile,

                children: [

                    {path: ROOT_URL + "my_account", name: "my_account", component: my_account, meta: { title: "my_account" }},

                ]

            },

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
