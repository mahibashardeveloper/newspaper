<template>

    <div class="container py-5">
        <div class="post">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="h3 mb-4">
                        Blog Title
                    </div>
                    <div class="mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut delectus, eveniet
                        0laudantium nemo quaerat qui veritatis! Ab aliquid corporis, cumque natus optio
                        quasi sit tenetur.
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="post-image"></div>
                </div>
            </div>
        </div>

        <div class="row customer-feedback">
            <div class="h3 fw-bold py-4">Comments</div>
            <div class="p-3 border">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <img :src="'/images/avatar.png'" class="img-fluid customer-image" alt="customer">
                        Mr. Mahi Bashar Akash
                    </div>
                    <div class="col-md-12 mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, nulla?
                    </div>
                    <div class="col-md-12 mt-3">
                        <textarea name="" class="form-textarea-control border border-secondary-subtle" cols="30" rows="3" required></textarea>
                    </div>
                </div>
                <a href="javascript:void(0)" class="btn btn-dark mt-3 py-2 px-4">Submit</a>
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
