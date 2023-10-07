<template>

    <header class="container py-4">
        <div class="nav-group">
            <a href="javascript:void(0)" class="nav-link-hover">
                the end
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                special news
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                citizen
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                Bangladesh
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                crime
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                the world war 2
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                consideration
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                the game
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                entertainment
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                entertainment
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                job
            </a>
            <a href="javascript:void(0)" class="nav-link-hover">
                living life
            </a>
        </div>
    </header>

    <section class="container">
        <div class="row row cols-1 row-cols-sm-1 row-cols-md-2">
            <div class="post" v-for="each in [1,2,3,4,5,6,7,8,9,10]">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="h3 mb-4">
                            Blog Title {{each}}
                        </div>
                        <div class="mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut delectus, eveniet laudantium nemo quaerat qui veritatis! Ab aliquid corporis, cumque natus optio quasi sit tenetur.
                        </div>
                        <router-link :to="{name: 'post'}" class="btn-post-link">Read me</router-link>
                    </div>
                    <div class="col-md-5">
                        <div class="post-image"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="d-flex justify-content-center py-4">
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
    </section>

</template>

<script>

export default {

    data(){

        return{



        }

    },

    mounted() {

        $('.banner-item').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })

    },

    methods: {

    }

}

</script>
