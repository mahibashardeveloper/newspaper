<template>

    <section class="w-100 bg-light">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-4 p-3">
                    <div id="time" class="fw-bold"></div>
                </div>
                <div class="col-md-4 p-3">
                    <router-link :to="{name: 'home'}" class="h3 text-decoration-none text-dark fw-bold">
                        {{ companyInfo_data.company_name }}
                    </router-link>
                </div>
                <div class="col-md-4 p-3 d-flex justify-content-center fw-bold">
                    <div class="dropdown">
                        <button class="btn btn-link text-decoration-none text-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <router-link :to="{name: 'registration'}" class="dropdown-item">
                                    Registration
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'login'}" class="dropdown-item">
                                    Login
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'details'}" class="dropdown-item">
                                    Profile
                                </router-link>
                            </li>
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
                        <a href="javascript:void(0)" class="h3 text-decoration-none text-dark fw-bold">
                            {{ companyInfo_data.company_name }}
                        </a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <a :href="socialInfo_data.facebook" target="_blank">
                        <i class="bi bi-facebook py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                    </a>
                    <a :href="socialInfo_data.twitter" target="_blank">
                        <i class="bi bi-twitter py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                    </a>
                    <a :href="socialInfo_data.instagram" target="_blank">
                        <i class="bi bi-instagram py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                    </a>
                    <a :href="socialInfo_data.linkedin" target="_blank">
                        <i class="bi bi-linkedin py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                    </a>
                    <a :href="socialInfo_data.youtube" target="_blank">
                        <i class="bi bi-youtube py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
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
        }

    },

    mounted() {

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
