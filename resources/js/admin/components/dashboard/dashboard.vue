<template>

    <div class="px-3">
        <div class="row fw-bold">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-3">
                <div class="bg-white h-100 p-3">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span v-if="category_total_data.total <= 1">
                                Category
                            </span>
                            <span v-else>
                                Categories
                            </span>
                        </div>
                        <div class="col-12 col-md-6 text-md-end">
                            {{category_total_data.total}}
                            <span v-if="category_total_data.total <= 1"> Item </span>
                            <span v-else> Items </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-3">
                <div class="bg-white h-100 p-3">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <span v-if="blog_total_data.total <= 1">
                                Blog
                            </span>
                            <span v-else>
                                Blogs
                            </span>
                        </div>
                        <div class="col-12 col-md-6 text-md-end">
                            {{blog_total_data.total}}
                            <span v-if="blog_total_data.total <= 1"> Item </span>
                            <span v-else> Items </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-3">
                <div class="bg-white h-100 p-3">
                    <div class="row">
                        <div class="col-12 col-md-6">Users</div>
                        <div class="col-12 col-md-6 text-md-end"> 10,000 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete To Do List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="h4 fw-bold text-center">
                        Are you sure ?
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-around align-items-center">
                    <button type="button" class="col-5 btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="col-5 btn-save">Save</button>
                </div>
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

                category_total_data: '0',

                blog_total_data: '0',

            }

        },

        mounted() {

            this.getCategoryTotal();
            this.getBlogTotal();

        },

        methods: {

            getCategoryTotal(){
                this.loading = true;
                apiService.POST(apiRoutes.categoryList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.category_total_data = res.data;
                    }
                });
            },

            getBlogTotal(){
                this.loading = true;
                apiService.POST(apiRoutes.blogList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.blog_total_data = res.data;
                    }
                });
            }

        }

    }

</script>
