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
