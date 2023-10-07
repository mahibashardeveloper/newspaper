import {createRouter, createWebHistory} from "vue-router";

// auth

import register from "../components/auth/register.vue";

import login from "../components/auth/login.vue";

import forget from "../components/auth/forget.vue";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// home

import home from "../components/home/home.vue";

// post

import post from "../components/post/post.vue";

// profile

import profile from "../components/profile/profile.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/front";

// route ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

    // layout

    {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // home

            {path: ROOT_URL + '/home', name: 'home', component: home, meta: {title: 'home'}},

            // post

            {path: ROOT_URL + '/post', name: 'post', component: post, meta: {title: 'post'}},

            // profile

            {path: ROOT_URL + '/profile', name: 'profile', component: profile, meta: {title: 'profile'}},

            // authentication

            {path: ROOT_URL + '/auth/register', name: 'register', component: register, meta: {title: 'register'}},

            {path: ROOT_URL + '/auth/login', name: 'login', component: login, meta: {title: 'login'}},

            {path: ROOT_URL + '/auth/forget', name: 'forget', component: forget, meta: {title: 'forget'}},

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
