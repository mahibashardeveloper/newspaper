<template>

    <section class="w-100 bg-light">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-4 p-3">
                    <div id="time"></div>
                </div>
                <div class="col-md-4 p-3">
                    <router-link :to="{name: 'home'}" class="h3 text-decoration-none text-dark">
                        {{ companyInfo_data.company_name }}
                    </router-link>
                </div>
                <div class="col-md-4 p-3 d-flex justify-content-center fw-bold">
                    <div class="dropdown">
                        <button class="btn btn-link text-decoration-none text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            একাউন্ট
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <span v-if="profile_data === null">
                                <li>
                                    <router-link :to="{name: 'registration'}" class="dropdown-item"> নিবন্ধন করুন </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'login'}" class="dropdown-item"> প্রবেশ করুন </router-link>
                                </li>
                            </span>
                            <span v-if="profile_data !== null">
                                <li>
                                    <router-link :to="{name: 'my_account'}" class="dropdown-item"> পার্শ্বচিত্র </router-link>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="logout">
                                        <span v-if="logoutLoading === false"> প্রস্থান করুন </span>
                                        <span v-if="logoutLoading === true"> লোড হচ্ছে... </span>
                                    </a>
                                </li>
                            </span>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <router-view/>

    <div class="w-100 bg-light">
        <div class="container footer">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="my-5">
                        <router-link :to="{name: 'home'}" class="h3 text-decoration-none text-dark">
                            {{ companyInfo_data.company_name }}
                        </router-link>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <a :href="socialInfo_data.facebook" target="_blank" class="text-secondary footer-hover">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a :href="socialInfo_data.twitter" target="_blank" class="text-secondary footer-hover">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a :href="socialInfo_data.instagram" target="_blank" class="text-secondary footer-hover">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a :href="socialInfo_data.linkedin" target="_blank" class="text-secondary footer-hover">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a :href="socialInfo_data.youtube" target="_blank" class="text-secondary footer-hover">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import apiService from "../../services/apiServices.js";
    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        data() {
            return {
                isActiveAdminDropDown: false,
                isActiveAdminSideBar: false,
                companyInfo_data: '',
                socialInfoLoading: false,
                socialInfo_data: '',
                profile_data: null,
                profileDataLoading: false,
                logoutLoading: false,
                core:window.core
            }

        },

        mounted() {

            if(this.core.UserInfo != null){
                this.getProfile();
            }

            function time() {
                const currentTime = new Date();
                const dayNames = ["রবিবার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার", "শনিবার"];
                const monthNames = ["জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];
                const yearNames = ["২০২৩", "২০২৪", "২০২৫", "২০২৬", "২০২৭", "২০২৮", "২০২৯", "২০৩০", "২০৩১", "২০৩২", "২০৩৩", "২০৩৪", "২০৩৫"];
                const datesNames = ["০১", "০২", "০৩", "০৪", "০৫", "০৬", "০৭", "০৮", "০৯", "১০", "১১", "১২", "১৩", "১৪", "১৫", "১৬", "১৭", "১৮", "১৯", "২০", "২১", "২২", "২৩", "২৪", "২৫", "২৬", "২৭", "২৮", "২৯", "৩০"];
                const day = dayNames[currentTime.getDay()];
                const month = monthNames[currentTime.getMonth()];
                const year = yearNames[currentTime.getFullYear() - 2023];
                const date = datesNames[currentTime.getDate() - 1];
                const autoLoadTime = `${day}  ${date}  ${month}  ${year}`;
                document.getElementById("time").innerHTML = autoLoadTime;
            }

            let timeInterval = setInterval(time, 1000);

            this.getCompanyInfo();

            this.getSocialInfo();

        },

        methods: {

            getProfile() {
                this.profileDataLoading = true;
                apiService.GET(apiRoutes.profile_details, (res) => {
                    this.profileDataLoading = false;
                    if (res.status === 200) {
                        this.profile_data = res.data;
                    }
                })
            },

            logout() {
                this.logoutLoading = true;
                apiService.GET(apiRoutes.logout, (res) => {
                    this.logoutLoading = false;
                    if (res.status === 200) {
                        window.location.reload();
                    }
                })
            },

            getCompanyInfo() {
                this.companyInfoLoading = true;
                apiService.GET(apiRoutes.globalInfo, (res) => {
                    this.companyInfoLoading = false;
                    if (res.status === 200) {
                        this.companyInfo_data = res.data;
                    }
                })
            },

            getSocialInfo() {
                this.socialInfoLoading = true;
                apiService.GET(apiRoutes.globalSocialInfo, (res) => {
                    this.socialInfoLoading = false;
                    if(res.status === 200) {
                        this.socialInfo_data = res.data;
                    }
                })
            },

        }
    }

</script>
