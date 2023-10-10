<template>

    <div class="admin-wrapper">
        <div class="admin-sidebar" :class="{active: isActiveAdminSideBar}">
            <div class="admin-sidebar-header">
                <router-link :to="{name: 'dashboard'}" class="admin-title">
                    অ্যাডমিন পোর্টাল
                </router-link>
                <a href="javascript:void(0)" class="admin-close" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="admin-sidebar-body">
                <router-link :to="{name: 'dashboard'}" class="admin-page-link" @click="remove">
                    ড্যাশবোর্ড
                </router-link>
                <router-link :to="{name: 'category'}" class="admin-page-link" @click="remove">
                    বিভাগসমূহ
                </router-link>
                <router-link :to="{name: 'blog'}" class="admin-page-link" @click="remove">
                    খবরসমূহ
                </router-link>
                <router-link :to="{name: 'user'}" class="admin-page-link" @click="remove">
                    পরিদর্শকগণ
                </router-link>
            </div>
            <div class="admin-sidebar-footer">
                <a href="javascript:void(0)" class="admin-footer-link" @click="logout">
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
                        <img class="img-fluid" v-if="!profile_data.avatar" :src="'https://ui-avatars.com/api/?name='+profile_data.full_name" alt="profile-dummy">
                        <img class="img-fluid" v-else :src="profile_data.media && profile_data.media.full_file_path" alt="profile">
                        <div class="admin-info">
                            <div class="admin-name">{{profile_data.full_name}}</div>
                            <div class="admin-email">{{profile_data.email}}</div>
                        </div>
                    </div>
                    <div class="admin-dropdown-menu" :class="{active: isActiveAdminDropDown}">
                        <router-link :to="{name: 'profile'}" class="admin-dropdown-link"  @click="remove">
                            প্রোফাইল
                        </router-link>
                        <a href="javascript:void(0)" class="admin-dropdown-link" @click="logout">
                            প্রস্থান করুন
                        </a>
                    </div>
                </div>
            </div>
            <div class="admin-content-body">
                <router-view/>
            </div>
        </div>
    </div>

</template>

<script>

    import apiService from "../../services/apiServices.js";
    import apiRoutes from "../../services/apiRoutes.js";
    export default {

        data(){
            return{
                isActiveAdminDropDown: false,
                isActiveAdminSideBar: false,
                logoutLoading: false,
                profile_data: '',
                profileDataLoading: false,
            }
        },

        mounted() {
            this.getProfile();
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
            },
            logout() {
                this.logoutLoading = true;
                apiService.GET(apiRoutes.logout, (res) => {
                    this.logoutLoading = false;
                    if (res.status === 200) {
                        this.$toast.success('Logout Successful', { position: "top-right" });
                        window.location.reload()
                    }
                })
            },
            getProfile() {
                this.profileDataLoading = true;
                apiService.GET(apiRoutes.profile_details, (res) => {
                    this.profileDataLoading = false;
                    if (res.status === 200) {
                        this.profile_data = res.data;
                    }
                })
            },
        }
    }

</script>
