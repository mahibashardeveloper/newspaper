<template>

    <section class="auth">
        <div class="container">
            <div class="vh-100 row justify-content-center align-items-center p-3">
                <div class="col-12 col-sm-10 col-lg-6 col-xl-5 p-3">
                    <form @submit.prevent="forgot" method="post" class="border rounded-4 px-4 py-5 bg-white shadow" v-if="forgotType === 1">
                        <div class="form-group fw-bold h4">
                            পাসওয়ার্ড ভুলে গেছেন
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">ইমেইল</label>
                            <input id="email" type="text" name="email" class="form-control shadow-none border-secondary-subtle" v-model="forgotParam.email" autocomplete="Off">
                            <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme" v-if="forgotLoading === false">
                                সংকেত পাঠাও
                            </button>
                            <button type="button" class="btn btn-theme" v-if="forgotLoading === true">
                                লোড হচ্ছে...
                            </button>
                        </div>
                        <div class="form-group">
                            আপনার পাসওয়ার্ড মনে পড়েছে
                            {
                                <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                                    প্রবেশ করুন
                                </router-link>
                            }
                        </div>
                    </form>
                    <form @submit.prevent="reset" method="post" class="border rounded-4 px-4 py-5 bg-white shadow" v-if="forgotType === 2">
                        <div class="form-group fw-bold h4">
                            আপনার একাউন্ট পুন:স্থাপন করুন
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">ইমেইল</label>
                            <input id="email" type="email" name="email" class="form-control" disabled v-model="resetParam.email" autocomplete="Off">
                        </div>
                        <div class="form-group">
                            <label for="code" class="form-label">কোড</label>
                            <input id="code" type="text" name="code" class="form-control" v-model="resetParam.code" autocomplete="Off">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">নতুন পাসওয়ার্ড</label>
                            <input id="password" type="password" name="password" class="form-control" v-model="resetParam.password" autocomplete="Off">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">পাসওয়ার্ড নিশ্চিতকরণ</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" v-model="resetParam.password_confirmation" autocomplete="Off">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme" v-if="resetLoading === false">
                                পুন:স্থাপন করুন
                            </button>
                            <button type="button" class="btn btn-theme" v-if="resetLoading === true">
                                লোড হচ্ছে...
                            </button>
                        </div>
                        <div class="form-group">
                            আপনার পাসওয়ার্ড মনে পড়েছে
                            <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                                প্রবেশ করুন
                            </router-link>
                        </div>
                    </form>
                    <div class="border rounded-4 px-4 py-5 bg-white shadow" v-if="forgotType === 3">
                        <div class="mb-4">
                            আপনার অ্যাকাউন্ট সফলভাবে পুন:স্থাপন করা হয়েছে
                        </div>
                        <router-link :to="{name: 'login'}" class="text-decoration-none text-primary">
                            প্রবেশ করুন
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>

    import apiService from "../../services/apiServices.js";
    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        data(){
            return{
                resetLoading: false,
                resetParam: {
                    email: '',
                    code: '',
                    password: '',
                    password_confirmation: '',
                },
                forgotType: 1,
                error: null,
                forgotLoading: false,
                forgotParam: {
                    email: ''
                }
            }
        },

        mounted() {},

        methods: {

            forgot() {
                this.forgotLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.forgot, this.forgotParam, (res) => {
                    this.forgotLoading = false
                    if (res.status === 200) {
                        this.forgotType = 2;
                        this.resetParam.email = this.forgotParam.email;
                        this.$toast.success('The verification code has been sent to your email.', { position: "top-right" });
                    } else {
                        this.error = res.error;
                    }
                })
            },

            reset() {
                this.resetLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.reset, this.resetParam, (res) => {
                    this.resetLoading = false;
                    if (res.status === 200) {
                        this.$toast.success('Password has been reset successfully.', { position: "top-right" });
                        this.forgotType = 3;
                    } else {
                        this.error = res.error;
                    }
                })
            },

        }
    }

</script>
