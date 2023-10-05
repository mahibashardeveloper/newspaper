<template>

    <div class="admin-wrapper">
        <div class="admin-sidebar">
            <div class="admin-sidebar-header">
                <a href="javascript:void(0)" class="admin-title">
                    Admin Portal
                </a>
                <a href="javascript:void(0)" class="admin-close">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="admin-sidebar-body">
                <router-link :to="{name: 'dashboard'}" class="admin-page-link">Dashboard</router-link>
                <router-link :to="{name: 'slider'}" class="admin-page-link">Slider</router-link>
                <router-link :to="{name: 'category'}" class="admin-page-link">Category</router-link>
                <router-link :to="{name: 'blog'}" class="admin-page-link">Blog</router-link>
                <router-link :to="{name: 'customer'}" class="admin-page-link">Customer</router-link>
            </div>
            <div class="admin-sidebar-footer">
                <a href="javascript:void(0)" class="admin-footer-link">
                    Logout
                </a>
            </div>
        </div>
        <div class="admin-content">
            <div class="admin-content-header">
                <a href="javascript:void(0)" class="admin-sidebar-controller-link">
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
                        <a href="javascript:void(0)" class="admin-dropdown-link">Profile</a>
                        <a href="javascript:void(0)" class="admin-dropdown-link">Logout</a>
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

        }

    },

    mounted() {



    },

    methods: {

        AdminDropdownController(){

            this.isActiveAdminDropDown = !this.isActiveAdminDropDown;

        }

    }

}

</script>
