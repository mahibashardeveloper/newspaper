<template>

    <div class="admin-wrapper">
        <div class="admin-sidebar" :class="{active: isActiveAdminSideBar}">
            <div class="admin-sidebar-header">
                <a href="javascript:void(0)" class="admin-title">
                    Admin Portal
                </a>
                <a href="javascript:void(0)" class="admin-close" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="admin-sidebar-body">
                <router-link :to="{name: 'dashboard'}" class="admin-page-link" @click="remove">
                    Dashboard
                </router-link>
                <router-link :to="{name: 'category'}" class="admin-page-link" @click="remove">
                    Categories
                </router-link>
                <router-link :to="{name: 'blog'}" class="admin-page-link" @click="remove">
                    Blogs
                </router-link>
                <router-link :to="{name: 'user'}" class="admin-page-link" @click="remove">
                    Users
                </router-link>
            </div>
            <div class="admin-sidebar-footer">
                <a href="javascript:void(0)" class="admin-footer-link">
                    Logout
                </a>
            </div>
        </div>
        <div class="admin-content">
            <div class="admin-content-header">
                <a href="javascript:void(0)" class="admin-sidebar-controller-link" @click="AdminSideBarController">
                    <i class="bi bi-justify-left"></i>
                </a>
                <div class="admin-profile-dropdown">
                    <div class="admin-marge" @click="AdminDropdownController">
                        <img :src="'/images/avatar.png'" class="img-fluid" alt="avatar">
                        <div class="admin-info">
                            <div class="admin-name">Mahi Bashar Akash</div>
                        </div>
                    </div>
                    <div class="admin-dropdown-menu" :class="{active: isActiveAdminDropDown}">
                        <router-link :to="{name: 'profile'}" class="admin-dropdown-link"  @click="remove">
                            Profile
                        </router-link>
                        <a href="javascript:void(0)" class="admin-dropdown-link" @click="remove">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
            <div class="admin-content-body">
                <router-view/>
            </div>
            <div class="admin-content-footer fw-bold">
                @ CopyRight - SesAlo - 2023 - 2050
            </div>
        </div>
    </div>

</template>

<script>

export default {

    data(){

        return{

            isActiveAdminDropDown: false,
            isActiveAdminSideBar: false,

        }

    },

    mounted() {



    },

    methods: {

        AdminDropdownController(){

            this.isActiveAdminDropDown = !this.isActiveAdminDropDown;

        },

        AdminSideBarController(){

            this.isActiveAdminSideBar = !this.isActiveAdminSideBar;

        },

        remove(){
            this.isActiveAdminDropDown = false;
            this.isActiveAdminSideBar = false;
        }

    }

}

</script>
