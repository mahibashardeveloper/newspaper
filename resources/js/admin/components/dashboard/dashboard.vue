<template>

    <div class="px-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-12 col-xl-12 col-xxl-5 p-3">
                <div class="bg-white h-100 p-3">
                    <doughnut/>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-12 col-xl-12 col-xxl-7 p-3">
                <div class="bg-white h-100 p-3">
                    <bar/>
                </div>
            </div>
        </div>
        <div class="p-1">
            <div class="p-2 text-center bg-white fw-bold">
                To do list - Schedule
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 fw-bold">
            <div class="p-3">
                <input type="text" name="" placeholder="Type Here" class="form-control shadow-none rounded-0 border-0 p-2" required>
            </div>
            <div class="p-3">
                <div class="bg-white p-2">
                    Task 1
                </div>
            </div>
            <div class="p-3">
                <div class="bg-white p-2">
                    Task 2
                </div>
            </div>
            <div class="p-3">
                <div class="bg-white p-2">
                    Task 3
                </div>
            </div>
            <div class="p-3">
                <div class="bg-white p-2">
                    Task 4
                </div>
            </div>
            <div class="p-3">
                <div class="bg-white p-2">
                    Task 5
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import doughnut from "./graph_chart/doughnut.vue";
import bar from "./graph_chart/bar.vue";

    export default {

        components: {

            doughnut, bar

        },

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
