<template>

    <section class="w-100 container-fluid profile">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 bg-white border p-3">
                <div class="py-4 d-flex justify-content-center">
                    <img class="img-fluid profile-avatar" v-if="!profile_data.avatar" :src="'https://ui-avatars.com/api/?name='+profile_data.full_name" alt="profile-dummy">
                    <img class="img-fluid profile-avatar" v-else :src="profile_data.media && profile_data.media.full_file_path" alt="profile">
                </div>
                <div class="py-3 ps-3">পুরো নাম <br><br> {{profile_data.full_name}}</div>
                <div class="py-3 ps-3">ইমেইল: <br><br> {{profile_data.email}}</div>
                <div class="d-flex align-items-center justify-content-between flex-wrap w-100 p-3">
                    <a href="javascript:void(0)" class="btn btn-secondary col-sm-5 col-12 mb-3 rounded-0" @click="openEditProfileModal">
                        পার্শ্বচিত্র সম্পাদন করুন
                    </a>
                    <a href="javascript:void(0)" class="btn btn-secondary col-sm-5 col-12 mb-3 rounded-0" @click="openEditPasswordModal">
                        পাসওয়ার্ড পরিবর্তন করুন
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- edit profile modal start -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        পার্শ্বচিত্র সম্পাদন করুন
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditProfileModal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="d-flex justify-content-center align-items-center">
                            <label for="file-upload" class="modal-avatar cs-pointer border border-secondary-subtle" v-if="editParam.avatar === null">
                                <input type="file" class="d-none" id="file-upload" @change="attachFile($event)">
                                <span v-if="editParam.avatar === null" class="modal-avatar">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="bi bi-card-image"></i>
                                        </div>
                                        Upload Image
                                    </div>
                                </span>
                            </label>
                            <img class="img-fluid modal-avatar" v-if="editParam.avatar !== null" :src="editParam.avatarFilePath" alt="profile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="full_name" class="form-label">
                            পুরো নাম
                        </label>
                        <input type="text" id="full_name" name="full_name" class="form-control border-secondary-subtle" v-model="editParam.full_name">
                        <div class="error-text" v-if="error != null && error.full_name !== undefined" v-text="error.full_name[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">
                            ইমেইল
                        </label>
                        <input type="email" id="email" name="email" class="form-control border-secondary-subtle" v-model="editParam.email">
                        <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn-cancel" @click="closeEditProfileModal"> Close </button>
                    <button type="button" class="btn-save" @click="updateProfile">
                        <span v-if="updateProfileLoading === false">সম্পাদন করুন</span>
                        <span v-if="updateProfileLoading === true">লোড হচ্ছে...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit profile modal end -->

    <!-- change password modal start -->
    <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        পাসওয়ার্ড পরিবর্তন করুন
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditPasswordModal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password" class="form-label">
                            নতুন পাসওয়ার্ড
                        </label>
                        <input type="password" id="password" name="password" class="form-control border-secondary-subtle" v-model="passwordParam.password">
                        <div class="error-text" v-if="error != null && error.password !== undefined" v-text="error.password[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            পাসওয়ার্ড নিশ্চিতকরণ
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border-secondary-subtle" v-model="passwordParam.password_confirmation">
                        <div class="error-text" v-if="error != null && error.password_confirmation !== undefined" v-text="error.password_confirmation[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn-cancel" @click="closeEditPasswordModal">
                        Close
                    </button>
                    <button type="submit" class="btn-save" @click="updatePassword">
                        <span v-if="updateProfileLoading === false"> Edit </span>
                        <span v-if="updateProfileLoading === true"> Loading... </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- change password modal end -->

</template>

<script>

    import apiService from "../../../services/apiServices.js";

    import apiRoutes from "../../../services/apiRoutes.js";

    export default {

        data(){

            return{
                profileDataLoading: false,

                profile_data: '',

                updateProfileLoading: false,

                error: null,

                edit: false,

                editParam: { full_name: '', email: '', avatar: '' },

                passwordParam: { password: '', password_confirmation: '' },

            }

        },

        mounted() {

            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')

            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

            this.getProfile();

        },

        methods: {

            attachFile(event) {
                let file = event.target.files[0];
                let formData = new FormData();
                formData.append("file", file)
                formData.append("media_type", 1);
                apiService.UPLOAD(apiRoutes.media, formData, (res) => {
                    event.target.value = '';
                    if (res.status === 200) {
                        this.editParam.avatarFilePath = res.data.full_file_path
                        this.editParam.avatar = res.data.id
                    }
                })
            },

            openEditProfileModal() {
                const modal = new bootstrap.Modal("#editProfileModal", {keyboard: false, backdrop: 'static'});
                modal.show();
                this.edit = true;
                this.editParam = JSON.parse(JSON.stringify(this.profile_data));
                this.editParam.avatarFilePath = this.editParam.media != null ? this.editParam.media.full_file_path : null
            },

            closeEditProfileModal() {
                this.edit = false;
                this.error = null;
                let myModalEl = document.getElementById('editProfileModal');
                let modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
            },

            openEditPasswordModal() {
                const modal = new bootstrap.Modal("#editPasswordModal", {keyboard: false, backdrop: 'static'});
                modal.show();
                this.edit = true;
                this.editParam = JSON.parse(JSON.stringify(this.profile_data));
            },

            closeEditPasswordModal() {
                this.edit = false;
                this.passwordParam = {password: "", password_confirmation: ""};
                this.error = null;
                let myModalEl = document.getElementById('editPasswordModal');
                let modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
            },

            getProfile() {
                this.profileDataLoading = true;
                apiService.GET(apiRoutes.profile_details, (res) => {
                    this.profileDataLoading = false;
                    if (res.status === 200) {
                        this.profile_data = res.data;
                    }
                })
            },

            updateProfile() {
                this.updateProfileLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.profile_update, this.editParam, (res) => {
                    this.updateProfileLoading = false;
                    if (res.status === 200) {
                        this.getProfile();
                        this.edit = false;
                        this.$toast.success('Your Profile has been updated successfully.', { position: "top-right" });
                        this.closeEditProfileModal();
                        window.location.reload();
                    } else {
                        this.error = res.errors;
                    }
                })
            },

            updatePassword() {
                this.updateProfileLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.profile_password, this.passwordParam, (res) => {
                    this.updateProfileLoading = false;
                    if (res.status === 200) {
                        this.getProfile();
                        this.edit = false;
                        this.$toast.success('Your password has been updated successfully.', { position: "top-right" });
                        this.closeEditPasswordModal();
                    } else {
                        this.error = res.errors;
                    }
                })
            },

        }

    }

</script>
