<template>

    <header class="py-5 bg-light mb-5">
        <div class="container">
            <div class="nav-group">
                <a href="javascript:void(0)" class="nav-link-hover" @click="formData.category_id = ''; blog_list(current_page = 0)">
                    সব
                </a>
                <a href="javascript:void(0)" class="nav-link-hover" v-for="(category) in displayedHeaderCategories" :key="category.id" v-if="loading === false" @click="formData.category_id = category.id; blog_list(current_page = 0);">
                    {{ category.name }}
                </a>
            </div>
        </div>
    </header>

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
        <div class="page-no-data-found"  v-if="blogs.length === 0 && blogLoading === false">
            <div class="w-100">
                <div class="mb-3">
                    <i class="bi bi-exclamation-circle fs-1"></i>
                </div>
                <div class="mb-3">কোনো তথ্য নেই </div>
            </div>
        </div>
        <!-- no data end -->

        <div class="row row cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2" v-if="blogLoading === false">
            <div class="post" v-for="(blog) in blogs" :key="blog.id">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="h3 mb-4">
                            {{blog.title}}
                        </div>
                        <div class="mb-4">
                            {{truncateDescription(blog.description)}}
                        </div>
                        <button class="btn border-0 btn-post-link" @click="openBlogModal(blog.id)"> আরো পড়ুন </button>
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

    <footer class="w-100 bg-light">
        <div class="container footer">
            <div class="d-flex justify-content-start flex-wrap py-4">
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="(category) in displayedFooterCategories" :key="category.id" v-if="loading === false">
                    <a href="javascript:void(0)" class="footer-hover w-100" @click="formData.category_id = category.id; blog_list(current_page = 0);">
                        {{ category.name }}
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="singleBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> খবর </h1>
                    <button type="button" class="btn-close" @click="hideBlogModal"></button>
                </div>
                <div class="modal-body">
                    <div class="post">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="h3 mb-4">
                                    {{blogSingleParam.title}}
                                </div>
                                <div class="mb-4">
                                    {{blogSingleParam.description}}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="post-image">
                                    <img :src="'/storage/media/image/'+blogSingleParam.avatar" class="img-fluid object-fit-cover" :alt="blogSingleParam.avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import apiService from "../../services/apiServices";
    import apiRoutes from "../../services/apiRoutes";

    export default {

        computed: {
            displayedHeaderCategories() {
                return this.categories.slice(0, 11);
            },
            displayedFooterCategories() {
                return this.categories.slice(11,40);
            }
        },

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
                singleParam: { id: '' },
                blogSingleParam: {},
            }
        },

        mounted() {
            this.blog_list();
            this.category_list();
        },

        methods: {

            truncateDescription(description){
                const words = description.split(' ');
                if (words.length > 10) {
                    return words.slice(0, 10).join(' ') + '...';
                } else {
                    return description;
                }
            },

            openBlogModal(id) {
                this.getSingle(id);
                let modal = new bootstrap.Modal(document.getElementById('singleBlogModal'))
                modal.show();
            },

            hideBlogModal() {
                const Modal = document.querySelector('#singleBlogModal');
                const Instance = bootstrap.Modal.getInstance(Modal);
                Instance.hide();
            },

            getSingle(id = null) {
                let param = { id: '' }
                if (id != null) { param.id = id } else { param.id = this.selected[0] }
                apiService.POST(apiRoutes.globalBlogSingle, param, (res) => {
                    if (res.status === 200) {
                        this.blogSingleParam = res.data;
                    } else {
                        this.error = res.errors;
                    }
                });
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
