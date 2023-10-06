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
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 fw-bold p-3">
            <div class="p-1">
                <input type="text" name="" placeholder="Type Here" class="form-control shadow-none rounded-0 border-0 p-2" required>
            </div>
            <div class="p-1">
                <div class="bg-white p-2">
                    <div class="row">
                        <div class="col-8">
                            Task 1
                        </div>
                        <div class="text-end col-4">
                            <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <div class="bg-white p-2">
                    <div class="row">
                        <div class="col-8">
                            Task 2
                        </div>
                        <div class="text-end col-4">
                            <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <div class="bg-white p-2">
                    <div class="row">
                        <div class="col-8">
                            Task 3
                        </div>
                        <div class="text-end col-4">
                            <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <div class="bg-white p-2">
                    <div class="row">
                        <div class="col-8">
                            Task 4
                        </div>
                        <div class="text-end col-4">
                            <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <div class="bg-white p-2">
                    <div class="row">
                        <div class="col-8">
                            Task 5
                        </div>
                        <div class="text-end col-4">
                            <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <div class="bg-white p-2">
                    <div class="row">
                        <div class="col-8">
                            Task 6
                        </div>
                        <div class="text-end col-4">
                            <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <div class="bg-white p-2">
                    <div class="row">
                        <div class="col-8">
                            Task 7
                        </div>
                        <div class="text-end col-4">
                            <a href="javascript:void(0)" class="text-decoration-none text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete To Do List</h1>
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
