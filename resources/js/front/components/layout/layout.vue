<template>

    <router-view/>

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
