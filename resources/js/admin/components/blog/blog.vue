<template>

    <div class="px-4 py-3">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <div class="position-relative">
                    <input type="text" class="form-control shadow-none rounded-0 py-3 ps-5" placeholder="Search Here" v-model="formData.q" @keyup="SearchData">
                    <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3 text-end">
                <a href="javascript:void(0)" class="btn btn-dark py-3 px-5 rounded-0" @click="manageModal(1, null)">
                    Add
                </a>
            </div>
        </div>
    </div>

    <div class="card-section">
        <div class="card-header">
            <div class="card-title">Blogs</div>
            <span class="d-flex align-items-center ms-3" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <a href="javascript:void(0)" class="select-icon" @click="deleteModal(1)">
                    <i class="bi bi-trash2"></i>
                </a>
                <a href="javascript:void(0)" class="ms-2 select-icon" v-if="selected.length === 1" @click="openEditModal">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">

            <!-- page loading start -->
            <div v-if="loading === true">
                <h6 class="card-text placeholder-glow">
                <span class="p-2">
                    <span class="placeholder col-12 py-3 mb-3"></span>
                </span>
                    <span class="p-2">
                    <span class="placeholder col-10 py-3 mb-3"></span>
                </span>
                    <span class="p-2">
                    <span class="placeholder col-7 py-3 mb-3"></span>
                </span>
                </h6>
            </div>
            <!-- page loading end -->

            <!-- no data start -->
            <div class="page-no-data-found" v-if="tableData.length === 0 && loading === false">
                <div class="w-100">
                    <div class="mb-3">
                        <i class="bi bi-exclamation-circle fs-1"></i>
                    </div>
                    <div class="mb-3">There are no data founded.</div>
                    <span>Click “Add” to create new data.</span>
                </div>
            </div>
            <!-- no data end -->

            <div v-if="tableData.length > 0 && loading === false">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-1 row-cols-xl-2 p-3">
                    <div class="p-2 border" v-for="(each) in tableData">
                        <div class="row align-items-center blog p-3">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-7">
                                <div class="h3 mb-4">
                                    {{each.title}}
                                </div>
                                <div class="mb-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut delectus, eveniet
                                    0laudantium nemo quaerat qui veritatis! Ab aliquid corporis, cumque natus optio
                                    quasi sit tenetur.
                                </div>
                                <div class="mb-3">
                                    <span v-if="each.category_info != null">
                                        {{ each.category_info.name }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-5">
                                <div class="blog-size">
                                    <span v-if="each.avatar === null">
                                    No Image Found
                                </span>
                                    <span class="w-100 h-100" v-if="each.avatar !== null">
                                    <img class="img-fluid" :src="'/storage/media/image/'+each.avatar" alt="person-image">
                                </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="javascript:void(0)" class="btn-edit col-5" @click="manageModal(1, each.id)">Edit</a>
                                    <a href="javascript:void(0)" class="btn-delete col-5" @click="deleteModal(1, each.id)">Delete</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center" v-if="tableData.length > 0 && loading === false">
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Blog</h1>
                    <button type="button" class="btn-close" @click="manageModal(2,'')"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <label for="file-upload" class="square-modal-avatar cs-pointer border border-secondary-subtle">
                                <input type="file" class="d-none" id="file-upload" @change="attachFile($event)">
                                <span v-if="blogParam.avatar === null" class="py-4">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="bi bi-card-image"></i>
                                        </div>
                                        Upload Image
                                    </div>
                                </span>
                                <img class="img-fluid" v-if="blogParam.avatar !== null" :src="'/storage/media/image/'+blogParam.avatar" alt="profile">
                            </label>
                        <div class="error-text" v-if="error != null && error.avatar !== undefined" v-text="error.avatar[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" name="title" class="form-control border-secondary-subtle" v-model="blogParam.title">
                        <div class="error-text" v-if="error != null && error.title !== undefined" v-text="error.title[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" v-model="blogParam.category_id" class="form-select">
                            <option :value="0">Select Category Option</option>
                            <option :value="each.id" v-for="(each) in category"> {{each.name}} </option>
                        </select>
                        <div class="error-text" v-if="error != null && error.category_id !== undefined" v-text="error.category_id[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-textarea-control border-secondary-subtle" v-model="blogParam.description"></textarea>
                        <div class="error-text" v-if="error != null && error.description !== undefined" v-text="error.description[0]"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" @click="manageModal(2,'')">Cancel</button>
                    <button type="button" class="btn-save" @click="manageBlog">
                        <span v-if="createLoading === false">
                            <span v-if="blogParam.id === ''">
                                save
                            </span>
                            <span v-if="blogParam.id !== ''">
                                Update
                            </span>
                        </span>
                        <span v-if="createLoading === true">
                            Loading...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="h4 fw-bold text-center">
                        Are you sure ?
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-around align-items-center">
                    <button type="button" class="col-5 btn-cancel" @click="deleteModal(2,'')">Cancel</button>
                    <button type="button" class="col-5 btn-delete" @click="deleteBlog">Confirm</button>
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
                loading: false,
                createLoading: false,
                deleteLoading: false,
                blog: [],
                category: [],
                blogParam: { avatar: '', title: '', description: '', category_id: '' },
                deleteParam: { ids: [] },
                tableData: [],
                formData: { limit: 10, page: 1 },
                total_pages: 0,
                current_page: 0,
                buttons: [],
                searchTimeout: null,
                error: null,
                responseData: null,
                total_data: 0,
                selected: [],
            }

        },

        mounted() {
            this.list();
            this.getCategory();
        },

        methods: {

            getCategory() {
                apiService.POST(apiRoutes.categoryList, '', (res) =>{
                    if(res.status === 200) {
                        this.category = res.data.data
                    }
                })
            },

            attachFile(event) {
                let file = event.target.files[0];
                let formData = new FormData();
                formData.append("file", file)
                formData.append("media_type", 1);
                apiService.UPLOAD(apiRoutes.media, formData, (res) => {
                    event.target.value = '';
                    if (res.status === 200) {
                        this.blogParam.avatar = res.data.file_path
                    }
                })
            },

            toggleCheckAll(e) {
                if (e.target.checked) {
                    this.tableData.forEach((v) => {
                        this.selected.push(v.id);
                    });
                } else {
                    this.selected = [];
                }
            },

            toggleCheck(e, id) {
                if (e.target.checked) {
                    this.selected.push(id);
                } else {
                    let index = this.selected.indexOf(id);
                    this.selected.splice(index, 1);
                }
            },

            CheckIfChecked(id) {
                return this.selected.map(function (id) {
                    return id
                }).indexOf(id) > -1;
            },

            openEditModal() {
                this.getSingle();
                const myModal = new bootstrap.Modal("#manageModal", {keyboard: false});
                myModal.show();
            },

            deleteBlog() {
                this.deleteLoading = true;
                this.selected.forEach((v) => {
                    this.deleteParam.ids.push(v);
                })
                apiService.POST(apiRoutes.blogDelete, this.deleteParam, (res) => {
                    this.deleteLoading = false;
                    if (res.status === 200) {
                        this.$toast.success(res.msg, {position: "bottom-right"});
                        this.deleteModal(2, '')
                        this.list();
                        this.selected = [];
                    } else {
                        this.error = res.errors;
                    }
                })
            },

            deleteModal(type, id) {
                if (type === 1) {
                    this.deleteParam.ids.push(id)
                    const myModal = new bootstrap.Modal("#deleteModal", {keyboard: false, backdrop: 'static'});
                    myModal.show();
                } else {
                    this.selected = [];
                    this.blogParam = { id: '', avatar: '', title: '', description: '', category_id: '' };
                    this.current_page = 1;
                    let myModalEl = document.getElementById('deleteModal');
                    let modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();
                }
            },

            manageModal(type, data = null) {
                this.error = null;
                this.blogParam = { id: '', title: '', description: '', category_id: 0, avatar: null };
                if (type === 1) {
                    this.getBlog();
                    if (data !== null) {
                        this.getSingle(data);
                    }
                    const myModal = new bootstrap.Modal("#manageModal", {keyboard: false, backdrop: 'static'});
                    myModal.show();
                } else {
                    const myModal = document.querySelector("#manageModal");
                    const modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();
                }
            },

            getBlog() {
                apiService.POST(apiRoutes.blogList, '', (res) => {
                    if (res.status === 200) {
                        this.blog = res.data.data
                    }
                })
            },

            manageBlog() {
                if (this.blogParam.id) {
                    this.edit();
                } else {
                    this.create();
                }
            },

            getSingle(id = null) {
                let param = { id: '' }
                if (id != null) { param.id = id } else { param.id = this.selected[0] }
                apiService.POST(apiRoutes.blogSingle, param, (res) => {
                    if (res.status === 200) {
                        this.blogParam = res.data;
                    } else {
                        this.error = res.errors;
                    }
                });
            },

            create() {
                this.createLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.blogCreate, this.blogParam, (res) => {
                    this.createLoading = false;
                    if (res.status === 200) {
                        this.$toast.success(res.msg, {position: "bottom-right"});
                        this.manageModal(2, null);
                        this.list();
                        this.selected = [];
                    } else {
                        this.error = res.errors;
                    }
                });
            },

            edit() {
                this.createLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.blogUpdate, this.blogParam, (res) => {
                    this.createLoading = false;
                    if (res.status === 200) {
                        this.getBlog();
                        this.$toast.success(res.msg, {position: "bottom-right"});
                        this.manageModal(2, null);
                        this.list();
                        this.selected = [];
                    } else {
                        this.error = res.errors;
                    }
                });
            },

            list() {
                this.loading = true;
                this.formData.page = this.current_page;
                apiService.POST(apiRoutes.blogList, this.formData, (res) => {
                    this.loading = false;
                    this.selected = [];
                    if (res.status === 200) {
                        this.tableData = res.data.data;
                        this.total_data = res.data.total;
                        this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page));
                        this.current_page = res.data.current_page;
                        this.buttons = [...Array(this.total_pages).keys()].map((i) => i + 1);
                    }
                });
            },

            SearchData() {
                clearTimeout(this.searchTimeout);
                this.searchTimeout = setTimeout(() => {
                    this.list();
                }, 500);
            },

            PrevPage() {
                if (this.current_page > 1) {
                    this.current_page = this.current_page - 1;
                    this.list()
                }
            },

            NextPage() {
                if (this.current_page < this.total_pages) {
                    this.current_page = this.current_page + 1;
                    this.list()
                }
            },

            pageChange(page) {
                this.current_page = page;
                this.list();
            },

        }

    }

</script>
