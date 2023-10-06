<template>

    <div class="px-4 py-3">
        <div class="row align-items-center">
            <div class="col-md-6"></div>
            <div class="col-md-6 mb-3 text-end">
                <a href="javascript:void(0)" class="btn btn-dark py-3 px-5 rounded-0" data-bs-toggle="modal" data-bs-target="#manageModal">
                    Add
                </a>
            </div>
        </div>
    </div>

    <div class="px-4 py-2">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3">
            <div class="p-2">
                <div class="position-relative">
                    <div class="img-banner">Slider 1</div>
                    <div class="position-button">
                        <a href="javascript:void(0)" class="btn-edit me-2 col-12" data-bs-toggle="modal" data-bs-target="#manageModal">Edit</a>
                        <a href="javascript:void(0)" class="btn-delete col-12" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="position-relative">
                    <div class="img-banner">Slider 2</div>
                    <div class="position-button">
                        <a href="javascript:void(0)" class="btn-edit me-2 col-12" data-bs-toggle="modal" data-bs-target="#manageModal">Edit</a>
                        <a href="javascript:void(0)" class="btn-delete col-12" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="position-relative">
                    <div class="img-banner">Slider 3</div>
                    <div class="position-button">
                        <a href="javascript:void(0)" class="btn-edit me-2 col-12" data-bs-toggle="modal" data-bs-target="#manageModal">Edit</a>
                        <a href="javascript:void(0)" class="btn-delete col-12" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="position-relative">
                    <div class="img-banner">Slider 4</div>
                    <div class="position-button">
                        <a href="javascript:void(0)" class="btn-edit me-2 col-12" data-bs-toggle="modal" data-bs-target="#manageModal">Edit</a>
                        <a href="javascript:void(0)" class="btn-delete col-12" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="position-relative">
                    <div class="img-banner">Slider 5</div>
                    <div class="position-button">
                        <a href="javascript:void(0)" class="btn-edit me-2 col-12" data-bs-toggle="modal" data-bs-target="#manageModal">Edit</a>
                        <a href="javascript:void(0)" class="btn-delete col-12" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="position-relative">
                    <div class="img-banner">Slider 6</div>
                    <div class="position-button">
                        <a href="javascript:void(0)" class="btn-edit me-2 col-12" data-bs-toggle="modal" data-bs-target="#manageModal">Edit</a>
                        <a href="javascript:void(0)" class="btn-delete col-12" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </div>
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
                        <label for="slider" class="form-label w-100">Photo</label>
                        <label id="slider" for="slider-image" class="w-100 btn-upload-image rounded-0 py-5">
                            <i class="bi bi-card-image me-3"></i>
                            Upload Image
                            <input type="file" name="" class="d-none" id="slider-image">
                        </label>
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
