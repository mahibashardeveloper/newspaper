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

    <header class="container py-4">
        <div class="nav-group">
            <router-link :to="{name: 'home'}" class="nav-link-hover" @click="formData.category_id = ''; blog_list(current_page = 0)">
                সব
            </router-link>
            <router-link :to="{name: 'home'}" class="nav-link-hover" v-for="(each) in getCategoryInRange(1, 9)" :key="each.id" v-if="loading === false" @click="formData.category_id = each.id; blog_list(current_page = 0);">
                {{each.name}}
            </router-link>
        </div>
    </header>

    <router-view/>

    <footer class="w-100 bg-light">
        <div class="container footer">
            <div class="py-4 ps-4">
                <a href="javascript:void(0)" class="h3 text-decoration-none text-dark fw-bold">
                    {{companyInfo_data.company_name}}
                </a>
            </div>
            <div class="d-flex justify-content-start flex-wrap py-4">
                <a href="javascript:void(0)" class="text-secondary footer-hover" v-for="(each) in getCategoryInRange(10, 30)" :key="each.id" v-if="loading === false" @click="formData.category_id = each.id; blog_list(current_page = 0);">
                    {{each.name}}
                </a>
            </div>
        </div>
    </footer>

</template>

<script>

    import apiService from "../../services/apiServices.js";
    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        computed: {

            getCategoryInRange() {
                return (startId, endId) => {
                    return this.categories.filter(category => category.id >= startId && category.id <= endId);
                };
            },

        },

        data(){

            return{
                isActiveAdminDropDown: false,
                isActiveAdminSideBar: false,
                companyInfo_data: '',
                categories: [],
                current_page: 0,
                loading: false,
                formData:{
                    keyword:'',
                    category_id:'',
                    limit: 10,
                    page: 1
                },
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

            this.blog_list();

            this.category_list();

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

            category_list() {
                this.loading = true;
                apiService.GET(apiRoutes.globalCategoryList, (res) =>{
                    this.loading = false;
                    if(res.status === 200) {
                        this.categories = res.data.data;
                    }
                })
            },

            blog_list() {
                this.blogLoading = true;
                this.formData.page = this.current_page;
                apiService.POST(apiRoutes.globalBlogList, this.formData,(res) =>{
                    this.blogLoading = false;
                    if (res.status === 200) {
                        this.blogs = res.data.data;
                        this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page));
                        this.current_page = res.data.current_page;
                        this.buttons = [...Array(this.total_pages).keys()].map((i) => i + 1);
                    }
                })
            },

        }

    }

</script>
