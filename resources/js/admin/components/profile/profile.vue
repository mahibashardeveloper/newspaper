<template>

    <div class="px-4 pt-4 profile">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-6 col-xxl-4 bg-white shadow-lg p-3">
                <div class="d-flex">
                    <a href="javascript:void(0)" class="btn btn-outline-dark me-2 rounded-0" @click="openSettingsModal" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Social Media">
                        <i class="bi bi-patch-check"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-outline-dark me-2 rounded-0" @click="openEditProfileModal" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Profile">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-outline-dark me-2 rounded-0" @click="openEditPasswordModal" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Password">
                        <i class="bi bi-fingerprint"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-outline-dark rounded-0" @click="openCompanyInfoModal" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Company info">
                        <i class="bi bi-building-fill"></i>
                    </a>
                </div>
                <div class="py-4 d-flex justify-content-center">
                    <div class="profile-circle">
                        <img class="img-fluid" v-if="!profile_data.avatar" :src="'https://ui-avatars.com/api/?name='+profile_data.full_name" alt="profile-dummy">
                        <img class="img-fluid" v-else :src="profile_data.media && profile_data.media.full_file_path" alt="profile">
                    </div>
                </div>
                <div class="py-1 px-3 d-flex align-items-center justify-content-start flex-wrap">
                    <div class="fw-bold me-2">
                        Name:
                    </div>
                    {{profile_data.full_name}}
                </div>
                <div class="py-1 px-3 d-flex align-items-center justify-content-start flex-wrap">
                    <div class="fw-bold me-2">
                        Email:
                    </div>
                    {{profile_data.email}}
                </div>
                <div class="py-1 px-3 d-flex align-items-center justify-content-start flex-wrap">
                    <div class="fw-bold me-2">
                        Company Name
                    </div>
                    {{companyInfo_data.company_name}}
                </div>
                <div class="py-1 px-3 d-flex align-items-center justify-content-start flex-wrap">
                    <div class="fw-bold me-2">
                        Social Media:
                    </div>
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <a :href="settings_data.facebook" target="_blank">
                            <i class="bi bi-facebook py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                        </a>
                        <a :href="settings_data.twitter" target="_blank">
                            <i class="bi bi-twitter py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                        </a>
                        <a :href="settings_data.instagram" target="_blank">
                            <i class="bi bi-instagram py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                        </a>
                        <a :href="settings_data.linkedin" target="_blank">
                            <i class="bi bi-linkedin py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                        </a>
                        <a :href="settings_data.youtube" target="_blank">
                            <i class="bi bi-youtube py-1 px-3 btn btn-dark mx-1 rounded-0 mb-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit profile modal start -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        Edit Profile
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
                            Full Name
                        </label>
                        <input type="text" id="full_name" name="full_name" class="form-control border-secondary-subtle" v-model="editParam.full_name">
                        <div class="error-text" v-if="error != null && error.full_name !== undefined" v-text="error.full_name[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input type="email" id="email" name="email" class="form-control border-secondary-subtle" v-model="editParam.email">
                        <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn-cancel" @click="closeEditProfileModal"> Close </button>
                    <button type="button" class="btn-save" @click="updateProfile">
                        <span v-if="updateProfileLoading === false">Edit</span>
                        <span v-if="updateProfileLoading === true">Loading...</span>
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
                        Edit Password
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditPasswordModal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password" class="form-label">
                            New Password
                        </label>
                        <input type="password" id="password" name="password" class="form-control border-secondary-subtle" v-model="passwordParam.password">
                        <div class="error-text" v-if="error != null && error.password !== undefined" v-text="error.password[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            Confirm Password
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

    <!-- edit social media modal start -->
    <div class="modal fade" id="editSettingsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        Edit Social Media
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditSettingsModal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="facebook" class="form-label">
                            Facebook Link
                        </label>
                        <input type="text" id="facebook" name="facebook" class="form-control border-secondary-subtle" v-model="editSettingsParam.facebook">
                        <div class="error-text" v-if="error != null && error.facebook !== undefined" v-text="error.facebook[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">
                            Twitter Link
                        </label>
                        <input type="text" id="twitter" name="twitter" class="form-control border-secondary-subtle" v-model="editSettingsParam.twitter">
                        <div class="error-text" v-if="error != null && error.twitter !== undefined" v-text="error.twitter[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">
                            Instagram Link
                        </label>
                        <input type="text" id="instagram" name="instagram" class="form-control border-secondary-subtle" v-model="editSettingsParam.instagram">
                        <div class="error-text" v-if="error != null && error.instagram !== undefined" v-text="error.instagram[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="form-label">
                            Linkedin Link
                        </label>
                        <input type="text" id="linkedin" name="linkedin" class="form-control border-secondary-subtle" v-model="editSettingsParam.linkedin">
                        <div class="error-text" v-if="error != null && error.linkedin !== undefined" v-text="error.linkedin[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="youtube" class="form-label">
                            Youtube Link
                        </label>
                        <input type="text" id="youtube" name="youtube" class="form-control border-secondary-subtle" v-model="editSettingsParam.youtube">
                        <div class="error-text" v-if="error != null && error.youtube !== undefined" v-text="error.youtube[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn-cancel" @click="closeEditSettingsModal"> Close </button>
                    <button type="button" class="btn-save" @click="updateSettings">
                        <span v-if="updateSettingsLoading === false">Edit</span>
                        <span v-if="updateSettingsLoading === true">Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit social media modal end -->

    <!-- edit company info modal start -->
    <div class="modal fade" id="editCompanyInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        Edit Company info
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditCompanyInfoModal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="company_name" class="form-label">
                            Company Name
                        </label>
                        <input type="text" id="company_name" name="company_name" class="form-control border-secondary-subtle" v-model="companyParam.company_name">
                        <div class="error-text" v-if="error != null && error.company_name !== undefined" v-text="error.company_name[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn-cancel" @click="closeEditCompanyInfoModal"> Close </button>
                    <button type="button" class="btn-save" @click="updateCompanyInfo">
                        <span v-if="updateCompanyInfoLoading === false">Edit</span>
                        <span v-if="updateCompanyInfoLoading === true">Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit company info modal end -->

</template>

<script>
    import apiService from "../../services/apiServices.js";
    import apiRoutes from "../../services/apiRoutes.js";
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

                companyParam: {company_name: ''},

                settingsLoading: false,

                settings_data: '',

                updateSettingsLoading: false,

                editSettingsParam: { facebook: '', twitter: '', instagram: '', linkedin: '', youtube: '' },

                companyInfoLoading: false,

                companyInfo_data: '',

                updateCompanyInfoLoading: false,

            }

        },

        mounted() {

            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')

            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

            this.getProfile();

            this.getSettings();

            this.getCompanyInfo();

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

            openSettingsModal() {
                const modal = new bootstrap.Modal("#editSettingsModal", {keyboard: false, backdrop: 'static'});
                modal.show();
                this.edit = true;
                this.editSettingsParam = JSON.parse(JSON.stringify(this.settings_data));
            },

            closeEditSettingsModal() {
                this.edit = false;
                this.error = null;
                let myModalEl = document.getElementById('editSettingsModal');
                let modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
            },

            getSettings() {
                this.settingsLoading = true;
                apiService.GET(apiRoutes.settings_details, (res) => {
                    this.settingsLoading = false;
                    if (res.status === 200) {
                        this.settings_data = res.data;
                    }
                })
            },

            updateSettings() {
                this.updateSettingsLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.settings_update, this.editSettingsParam, (res) => {
                    this.updateSettingsLoading = false;
                    if (res.status === 200) {
                        this.getSettings();
                        this.edit = false;
                        this.$toast.success('Your Settings has been updated successfully.', { position: "top-right" });
                        this.closeEditSettingsModal();
                    } else {
                        this.error = res.errors;
                    }
                })
            },

            openCompanyInfoModal() {
                const modal = new bootstrap.Modal("#editCompanyInfoModal", {keyboard: false, backdrop: 'static'});
                modal.show();
                this.edit = true;
                this.companyParam = JSON.parse(JSON.stringify(this.companyInfo_data));
            },

            closeEditCompanyInfoModal() {
                this.edit = false;
                this.error = null;
                let myModalEl = document.getElementById('editCompanyInfoModal');
                let modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
            },

            getCompanyInfo() {
                this.companyInfoLoading = true;
                apiService.GET(apiRoutes.companyInfo, (res) => {
                    this.companyInfoLoading = false;
                    if (res.status === 200) {
                        this.companyInfo_data = res.data;
                    }
                })
            },

            updateCompanyInfo() {
                this.updateCompanyInfoLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.companyUpdate, this.companyParam, (res) => {
                    this.updateCompanyInfoLoading = false;
                    if (res.status === 200) {
                        this.getCompanyInfo();
                        this.edit = false;
                        this.$toast.success('Your company info has been updated successfully.', { position: "top-right" });
                        this.closeEditCompanyInfoModal();
                    } else {
                        this.error = res.errors;
                    }
                })
            },

        }

    }

</script>
