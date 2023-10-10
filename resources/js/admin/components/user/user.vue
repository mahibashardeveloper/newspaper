<template>

    <div class="px-4 py-3">
        <div class="row align-items-start">
            <div class="col-md-6 mb-3">
                <div class="position-relative">
                    <input type="text" class="form-control ps-5" placeholder="এখানে অনুসন্ধান করুন" v-model="formData.q" @keyup="SearchData">
                    <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-section">
        <div class="card-header">
            <div class="card-title">পরিদর্শকগণ</div>
            <span class="d-flex align-items-center ms-3" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <a href="javascript:void(0)" class="select-icon" @click="deleteModal(1)">
                    <i class="bi bi-trash2"></i>
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
                    <div class="mb-3">কোন তথ্য নেই.</div>
                </div>
            </div>
            <!-- no data end -->

            <div v-if="tableData.length > 0 && loading === false">

                <div class="row card-topic">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 d-none d-sm-block">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" class="form-check-input me-3 d-none d-sm-block" :checked="tableData.length > 0 && tableData.length === selected.length" @change="toggleCheckAll($event)">
                            নাম
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 d-none d-sm-block">
                        ইমেইল
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 d-none d-sm-block">

                    </div>
                </div>

                <div class="row card-list" v-for="(each) in tableData">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                        <div class="marge-title py-3"> Name </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <input type="checkbox" class="form-check-input me-3 d-none d-sm-block" :checked="CheckIfChecked(each.id)" @change="toggleCheck($event,each.id)">
                            {{each.full_name}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                        <div class="marge-title py-3"> Email </div>
                        {{each.email}}
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                        <a href="javascript:void(0)" class="text-decoration-none text-danger" @click="deleteModal(1, each.id)">
                            <i class="bi bi-trash2"></i>
                        </a>
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

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">পরিদর্শক মুছুন</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="h4 fw-bold text-center">
                        আপনি কি নিশ্চিত ?
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-around align-items-center">
                    <button type="button" class="col-5 btn-cancel" @click="deleteModal(2,'')">বাতিল করুন</button>
                    <button type="button" class="col-5 btn-delete" @click="deleteUser">
                        <span v-if="deleteLoading === false">
                            নিশ্চিত করুন
                        </span>
                        <span v-if="deleteLoading === true">
                            লোড হচ্ছে...
                        </span>
                    </button>
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
                user: [],
                userParam: {
                    full_name: '',
                    email: ''
                },
                deleteParam: {
                    ids: []
                },
                tableData: [],
                formData: {
                    limit: 10,
                    page: 1
                },
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

        },

        methods: {

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

            list() {
                this.loading = true;
                this.formData.page = this.current_page;
                apiService.POST(apiRoutes.userList, this.formData, (res) => {
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

            deleteModal(type, id) {
                if (type === 1) {
                    this.deleteParam.ids.push(id)
                    const myModal = new bootstrap.Modal("#deleteModal", {keyboard: false, backdrop: 'static'});
                    myModal.show();
                } else {
                    this.selected = [];
                    this.userParam = { id: '', full_name: '', email: '', avatar: '' };
                    this.current_page = 1;
                    let myModalEl = document.getElementById('deleteModal');
                    let modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();
                }
            },

            deleteUser() {
                this.deleteLoading = true;
                this.selected.forEach((v) => {
                    this.deleteParam.ids.push(v);
                })
                apiService.POST(apiRoutes.userDelete, this.deleteParam, (res) => {
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

            getSingle(id = null) {
                let param = { id: '' }
                if (id != null) { param.id = id } else { param.id = this.selected[0] }
                apiService.POST(apiRoutes.userSingle, param, (res) => {
                    if (res.status === 200) {
                        this.userParam = res.data;
                    } else {
                        this.error = res.errors;
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
