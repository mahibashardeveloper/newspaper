<template>

    <section class="w-100 bg-light">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-4 p-3">
                    Friday, 06 october 2023
                </div>
                <div class="col-md-4 p-3">
                    <router-link :to="{name: 'home'}" class="h1 text-decoration-none text-dark">
                        Ses Alo
                    </router-link>
                </div>
                <div class="col-md-4 p-3 d-flex justify-content-center">
                    <div class="dropdown px-2 border-end">
                        <button class="btn btn-link text-decoration-none text-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <router-link :to="{name: 'register'}" class="dropdown-item">
                                    Registration
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'login'}" class="dropdown-item">
                                    Login
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'profile'}" class="dropdown-item">
                                    Profile
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown px-2">
                        <button
                            class="btn btn-link text-decoration-none text-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ selectedLanguage }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#" @click="changeLanguage('English')">English</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" @click="changeLanguage('Bangla')">Bangla</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div @change="translateContent">
        <router-view/>
    </div>

</template>

<script>

export default {

    data(){

        return{

            isActiveAdminDropDown: false,
            isActiveAdminSideBar: false,
            selectedLanguage: 'English', // Default language

        }

    },

    mounted() {



    },

    methods: {

        changeLanguage(language) {
            this.selectedLanguage = language;
            this.translateContent();
        },
        translateContent() {
            if (this.selectedLanguage === 'Bangla') {

            } else {

            }
        },

    }

}

</script>
