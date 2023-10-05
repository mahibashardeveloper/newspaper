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
                <a href="javascript:void(0)" class="admin-page-link">Dashboard</a>
                <a href="javascript:void(0)" class="admin-page-link">Slider</a>
                <a href="javascript:void(0)" class="admin-page-link">Category</a>
                <a href="javascript:void(0)" class="admin-page-link">Blog</a>
                <a href="javascript:void(0)" class="admin-page-link">Customer</a>
            </div>
            <div class="admin-sidebar-footer">
                <a href="javascript:void(0)" class="admin-footer-link">
                    Logout
                </a>
            </div>
        </div>
        <div class="admin-content">
            <div class="admin-content-header">
                <a href="javascript:void(0)" class="sidebar-controller-link">
                    <i class="bi bi-justify-left"></i>
                </a>
                <div class="admin-profile-dropdown">
                    <div class="admin-marge">
                        <img :src="''" class="img-fluid" alt="avatar">
                        <div class="admin-info">
                            <div class="admin-name"></div>
                        </div>
                    </div>
                    <div class="admin-dropdown-menu">
                        <a href="javascript:void(0)" class="admin-dropdown-link">Profile</a>
                        <a href="javascript:void(0)" class="admin-dropdown-link">Logout</a>
                    </div>
                </div>
            </div>
            <div class="admin-content-body">

            </div>
            <div class="admin-content-footer">

            </div>
        </div>
    </div>

</template>

<script>

export default {

    data(){

        return{



        }

    },

    mounted() {



    },

    methods: {



    }

}

</script>
