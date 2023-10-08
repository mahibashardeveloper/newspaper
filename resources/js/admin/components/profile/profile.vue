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

                settingsLoading: false,

                settings_data: '',

                updateSettingsLoading: false,

                editSettingsParam: { facebook: '', twitter: '', instagram: '', linkedin: '', youtube: '' },

            }

        },

        mounted() {

            this.getProfile();

            this.getSettings();

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
                this.editParam = JSON.parse(JSON.stringify(this.settings_data));
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

        }

    }

</script>
