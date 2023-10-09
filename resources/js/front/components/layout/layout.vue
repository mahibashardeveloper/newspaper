<template>

    <section class="w-100 bg-light">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-4 p-3">
                    <div id="time"></div>
                </div>
                <div class="col-md-4 p-3">
                    <router-link :to="{name: 'home'}" class="h3 text-decoration-none text-dark fw-bold">
                        {{companyInfo_data.company_name}}
                    </router-link>
                </div>
                <div class="col-md-4 p-3 d-flex justify-content-center">
                    <div class="dropdown">
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

    <footer class="w-100 bg-light">
        <div class="container footer">
            <div class="py-4 ps-4">
                <router-link :to="{name: 'home'}" class="h3 text-decoration-none text-dark fw-bold">
                    Ses Alo
                </router-link>
            </div>
            <div class="d-flex justify-content-start flex-wrap py-4">
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    গোলটেবিল
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    বিশেষ সংখ্যা
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    কিশোর আলো
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    চিরন্তন ১৯৭১
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    বিজ্ঞানচিন্তা
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    প্রতিচিন্তা
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    প্রথমা
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    বন্ধুসভা
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    প্রথম আলো ট্রাস্ট
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    মোবাইল ভ্যাস
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    নাগরিক সংবাদ
                </a>
                <a href="javascript:void(0)" class="text-secondary footer-hover">
                    ইপেপার
                </a>
            </div>
        </div>
    </footer>

</template>

<script>

import apiService from "../../services/apiServices.js";
import apiRoutes from "../../services/apiRoutes.js";

export default {

    data(){

        return{
            isActiveAdminDropDown: false,
            isActiveAdminSideBar: false,
            companyInfo_data: '',
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

    }

}

</script>
