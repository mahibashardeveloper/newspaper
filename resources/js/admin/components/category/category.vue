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
            <div class="col-md-6 mb-3 text-end">
                <a href="javascript:void(0)" class="btn btn-dark py-3 px-5 rounded-0" data-bs-toggle="modal" data-bs-target="#manageModal">
                    Add
                </a>
            </div>
        </div>
    </div>

    <div class="card-section">
        <div class="card-header">
            <div class="card-title">Categories</div>
        </div>
        <div class="card-body">
            <div class="row card-topic">
                <div class="col-12 col-sm-6 d-none d-sm-block">Name</div>
                <div class="col-12 col-sm-6 d-none d-sm-block text-sm-end">Action</div>
            </div>
            <div class="row card-list" v-for="each in [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]">
                <div class="col-12 col-sm-6"> <div class="marge-title py-3"> Name </div> Category {{each}}</div>
                <div class="col-12 col-sm-6 text-sm-end">
                    <div class="marge-title py-3"> Action </div>
                    <a href="javascript:void(0)" class="text-decoration-none text-secondary me-3" data-bs-toggle="modal" data-bs-target="#manageModal">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="bi bi-trash2"></i>
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

    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control shadow-none rounded-0 p-3" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-save">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
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

export default {

    data(){

        return{



        }

    },

    mounted() {



    },

    methods: {



    }

}

</script>
