<template>

    <div class="px-4 py-3">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <div class="position-relative">
                    <input type="text" name="" class="form-control shadow-none rounded-0 py-3 ps-5" placeholder="Search Here" required>
                    <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-section">
        <div class="card-header">
            <div class="card-title">Users</div>
        </div>
        <div class="card-body">
            <div class="row card-topic">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 d-none d-sm-block">Name</div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 d-none d-sm-block">Email</div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 d-none d-sm-block">Phone Number</div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-2 d-none d-sm-block">Action</div>
            </div>
            <div class="row card-list" v-for="each in [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="marge-title py-3"> Name </div>
                    mr. / ms. User Name {{each}}
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="marge-title py-3"> Email </div>
                    mr. / ms. user email {{each}}
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="marge-title py-3"> Phone Number </div>
                    mr. / ms. user Phone Number {{each}}
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-2">
                    <div class="marge-title py-3"> Action </div>
                    <a href="javascript:void(0)" class="text-decoration-none text-secondary">
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="pagination">
                <div class="page-item">
                    <a href="javascript:void(0)" class="page-link">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                </div>
                <div class="page-item">
                    <a href="javascript:void(0)" class="page-link">
                        1
                    </a>
                </div>
                <div class="page-item">
                    <a href="javascript:void(0)" class="page-link">
                        2
                    </a>
                </div>
                <div class="page-item">
                    <a href="javascript:void(0)" class="page-link">
                        3
                    </a>
                </div>
                <div class="page-item">
                    <a href="javascript:void(0)" class="page-link">
                        <i class="bi bi-caret-right-fill"></i>
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

        data(){

            return{
                loading: false,
                createLoading: false,
                deleteLoading: false,
                user: [],
                userParam: { name: '' },
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

            openEditModal() {
                this.getSingle();
                const myModal = new bootstrap.Modal("#manageModal", {keyboard: false});
                myModal.show();
            },

            manageModal(type, data = null) {
                this.error = null;
                this.userParam = { id: '', full_name: '', email: '', avatar: null };
                if (type === 1) {
                    this.getUser();
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

            getUser() {
                apiService.POST(apiRoutes.userList, '', (res) => {
                    if (res.status === 200) {
                        this.user = res.data.data
                    }
                })
            },

            manageCategory() {
                if (this.userParam.id) {
                    this.edit();
                } else {
                    this.create();
                }
            },

            getSingle(id = null) {
                let param = { id: '' }
                if (id != null) { param.id = id } else { param.id = this.selected[0] }
                apiService.POST(apiRoutes.categorySingle, param, (res) => {
                    if (res.status === 200) {
                        this.categoryParam = res.data;
                    } else {
                        this.error = res.errors;
                    }
                });
            },

            create() {
                this.createLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.categoryCreate, this.categoryParam, (res) => {
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
                apiService.POST(apiRoutes.categoryUpdate, this.categoryParam, (res) => {
                    this.createLoading = false;
                    if (res.status === 200) {
                        this.getCategory();
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
                apiService.POST(apiRoutes.categoryList, this.formData, (res) => {
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
