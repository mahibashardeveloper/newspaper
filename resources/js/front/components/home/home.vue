<template>

    <section class="container">

        <!-- page loading start -->
        <div v-if="blogLoading === true">
            <h6 class="card-text placeholder-glow">
                <span class="p-2">
                    <span class="placeholder col-12 py-3 mb-3"></span>
                </span>
                <span class="p-2">
                    <span class="placeholder col-10 py-3 mb-3"></span>
                </span>
                <span class="p-2">
                    <span class="placeholder col-8 py-3 mb-3"></span>
                </span>
            </h6>
        </div>
        <!-- page loading end -->

        <!-- no data start -->
        <div class="page-no-data-found"  v-if="blogs.length === 0 && loading === false">
            <div class="w-100">
                <div class="mb-3">
                    <i class="bi bi-exclamation-circle fs-1"></i>
                </div>
                <div class="mb-3">কোনো তথ্য নেই </div>
            </div>
        </div>
        <!-- no data end -->

        <div class="row row cols-1 row-cols-sm-1 row-cols-md-2" v-if="blogLoading === false">
            <div class="post" v-for="(blog) in blogs" :key="blog.id">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="h3 mb-4">
                            {{blog.title}}
                        </div>
                        <div class="mb-4">
                            {{blog.description}}
                        </div>
                        <router-link :to="{name: 'post'}" class="btn-post-link">Read me</router-link>
                    </div>
                    <div class="col-md-5">
                        <div class="post-image">
                            <span v-if="blog.avatar === null">
                                No Image Found
                            </span>
                            <span class="w-100 h-100" v-if="blog.avatar !== null">
                                <img class="img-fluid" :src="'/storage/media/image/'+blog.avatar" alt="blog-image">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="d-flex justify-content-center py-4" v-if="blogs.length > 0 && loading === false">
        <div class="pagination">
            <div class="page-item" @click="PrevPage">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-caret-left-fill"></i>
                </a>
            </div>
            <div v-if="buttons.length <= 6" class="d-flex">
                <div v-for="(page) in buttons" class="page-item" :class="{'active': current_page === page}">
                    <a class="page-link" @click="pageChange(page)" href="javascript:void(0)" v-text="page"></a>
                </div>
            </div>
            <div v-if="buttons.length > 6" class="d-flex">
                <div class="page-item" :class="{'active': current_page === 1}">
                    <a class="page-link" @click="pageChange(1)" href="javascript:void(0)">1</a>
                </div>
                <div v-if="current_page > 3" class="page-item">
                    <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)">...</a>
                </div>
                <div v-if="current_page === buttons.length" class="page-item" :class="{'active': current_page === (current_page - 2)}">
                    <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)" v-text="current_page - 2"></a>
                </div>
                <div v-if="current_page > 2" class="page-item" :class="{'active': current_page === (current_page - 1)}">
                    <a class="page-link" @click="pageChange(current_page - 1)" href="javascript:void(0)" v-text="current_page - 1"></a>
                </div>
                <div v-if="current_page !== 1 && current_page !== buttons.length" class="page-item active">
                    <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)" v-text="current_page"></a>
                </div>
                <div v-if="current_page < buttons.length - 1" class="page-item" :class="{'active': current_page === (current_page + 1)}">
                    <a class="page-link" @click="pageChange(current_page + 1)" href="javascript:void(0)" v-text="current_page + 1"></a>
                </div>
                <div v-if="current_page === 1" class="page-item" :class="{'active': current_page === (current_page + 2)}">
                    <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)" v-text="current_page + 2"></a>
                </div>
                <div v-if="current_page < buttons.length - 2" class="page-item">
                    <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)">...</a>
                </div>
                <div class="page-item" :class="{'active': current_page === (current_page - buttons.length)}">
                    <a class="page-link" @click="pageChange(buttons.length)" href="javascript:void(0)" v-text="buttons.length"></a>
                </div>
            </div>
            <div class="page-item" @click="NextPage">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-caret-right-fill"></i>
                </a>
            </div>
        </div>
    </section>

</template>

<script>

    import apiService from "../../services/apiServices";

    import apiRoutes from "../../services/apiRoutes";

    export default {

        data(){

            return{

                categories: [],

                blogs: [],

                formData:{
                    keyword:'',
                    category_id:'',
                    limit: 10,
                    page: 1
                },

                blogLoading: false,

                loading: false,

                total_pages: 0,

                current_page: 0,

                buttons: [],

                searchTimeout: null,

                error: null,

                responseData: null,

            }

        },

        mounted() {

            this.blog_list();

            this.category_list();

        },

        methods: {

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

            PrevPage() {
                if (this.current_page > 1) {
                    this.current_page = this.current_page - 1;
                    this.blog_list();
                }
            },

            NextPage() {
                if (this.current_page < this.total_pages) {
                    this.current_page = this.current_page + 1;
                    this.blog_list();
                }
            },

            pageChange(page) {
                this.current_page = page;
                this.blog_list();
            },

        }

    }

</script>
