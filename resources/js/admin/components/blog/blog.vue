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
            <div class="card-title">Blogs</div>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 p-3">
                <div class="p-2" v-for="each in [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]">
                    <div class="border p-2">
                        <div class="blog-size">
                            Blog {{each}}
                        </div>
                        <div class="mb-3 h3">Blog Title {{each}}</div>
                        <div class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequuntur deserunt dicta incidunt minus perferendis voluptas? Doloremque ducimus ea eius iste libero, optio saepe sint!</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="javascript:void(0)" class="btn-edit col-5" data-bs-toggle="modal" data-bs-target="#manageModal">Edit</a>
                            <a href="javascript:void(0)" class="btn-delete col-5" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </div>
                    </div>
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
                <div class="page-item active">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="blog-image" class="w-100 btn-upload-image rounded-0 py-5 mb-3">
                        <i class="bi bi-card-image"></i>
                        Upload photo or video
                        <input type="file" name="" class="d-none" id="blog-image">
                    </label>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control shadow-none rounded-0 p-3 border-secondary-subtle" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Description</label>
                        <textarea name="" id="" cols="30" rows="5" class="form-textarea-control border-secondary-subtle" required></textarea>
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
