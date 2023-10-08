<template>

    <div class="px-4 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-6 col-xxl-4 bg-white shadow-lg p-3">
                <div class="py-4 d-flex justify-content-center">
                    <div class="col-6">
                        <img :src="'/images/avatar.png'" class="img-fluid" alt="avatar">
                    </div>
                </div>
                <div class="py-3 ps-3">Name: Mahi Bashar Akash</div>
                <div class="py-3 ps-3">Email: mahibashar2023@gmail.com</div>
                <div class="d-flex align-items-center justify-content-between flex-wrap w-100 p-3">
                    <a href="javascript:void(0)" class="btn btn-secondary col-sm-5 col-12 my-3 rounded-0" data-bs-toggle="modal" data-bs-target="#profileModal">
                        Profile Edit
                    </a>
                    <a href="javascript:void(0)" class="btn btn-secondary col-sm-5 col-12 my-3 rounded-0" data-bs-toggle="modal" data-bs-target="#passwordModal">
                        Password Change
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control shadow-none rounded-0 p-3 border-secondary-subtle" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" name="name" class="form-control shadow-none rounded-0 p-3 border-secondary-subtle" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-save">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Password Change</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Current Password</label>
                        <input type="text" name="name" class="form-control shadow-none rounded-0 p-3 border-secondary-subtle" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">New Password</label>
                        <input type="text" name="name" class="form-control shadow-none rounded-0 p-3 border-secondary-subtle" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Confirm Password</label>
                        <input type="text" name="name" class="form-control shadow-none rounded-0 p-3 border-secondary-subtle" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-save">Save</button>
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
