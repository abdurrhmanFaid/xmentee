<template>
<!--    // name > username > email > gender > image > messaging_id > phone_number > default_locale-->
<!--    // social_links-->
    <div class="card-body">
        <form @submit.prevent="update" @keydown="form.onKeydown($event)">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">{{trans('user.name')}}</label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                            name="name"
                            v-model="form.name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">{{trans('user.username')}}</label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('username') }"
                            name="username"
                            v-model="form.username">
                        <has-error :form="form" field="username"></has-error>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">{{trans('user.email')}}</label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('email') }"
                            name="email"
                            v-model="form.email">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">{{trans('user.gender')}}</label>
                        <select class="form-control" name="gender" v-model="form.gender">
                            <option value="male">{{trans('user.male')}}</option>
                            <option value="female">{{trans('user.female')}}</option>
                        </select>
                        <has-error :form="form" field="gender"></has-error>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">{{trans('user.phone_number')}}</label>
                        <input
                            type="number"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('phone_number') }"
                            name="username"
                            v-model="form.phone_number">
                        <has-error :form="form" field="phone_number"></has-error>
                    </div>
                </div>
                <div class="col-md-8">
                    <div v-if="editingMessaging" class="form-group">
                        <label class="form-label">{{trans('user.messaging_id')}}</label>
                        <input
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('messaging_id') }"
                            name="username"
                            v-model="form.messaging_id">
                        <has-error :form="form" field="messaging_id"></has-error>
                        <label class="text-muted">
                            {{trans('user.messaging_desc')}}
                            <a href="#" data-toggle="modal" data-target="#messagingLinkDescModal">
                                {{trans('user.messaging_how_to_link')}}
                            </a>
                            <template v-if="user.messaging_id">
                                <a href="#" @click.prevent="unlinkMessaging">
                                    | {{trans('user.messaging_unlink')}}
                                </a>
                                <a href="#" @click.prevent="cancelEditMessaging">
                                    | {{trans('user.messaging_edit_cancel')}}
                                </a>
                            </template>
                        </label>
                        <div class="modal fade" id="messagingLinkDescModal" tabindex="-1" role="dialog" aria-labelledby="messagingLinkDescModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('user.messaging_how_to_link_title')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" v-html="trans('user.messaging_how_to_link_desc')"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="alert alert-success">
                        {{trans('user.messaging_linked')}}
                        <button class="badge badge-warning" @click.prevent="editingMessaging=true">{{trans('user.messaging_edit')}}</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">{{trans('user.change_avatar')}}</label> <br>
                        <input
                            id="avatar"
                            data-input-accept-types="image/*"
                            type="hidden"
                            role="uploadcare-uploader">
                    </div>
                </div>
            </div>
            <div class="row form-group mb-0">
                <label class="col-md-3 my-1 control-label">{{trans('app_localization')}}</label>
                <div class="form-check-inline my-1">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="arLang" name="default_locale" value="ar" v-model="form.default_locale" class="custom-control-input">
                        <label class="custom-control-label" for="arLang">عربى</label>
                    </div>
                </div>
                <div class="form-check-inline my-1">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="enLang" name="default_locale" value="en" v-model="form.default_locale" class="custom-control-input">
                        <label class="custom-control-label" for="enLang">English</label>
                    </div>
                </div>
                <has-error :form="form" field="default_locale"></has-error>
            </div>
            <hr>
            <div class="row">
                <template v-if="changingSecurity">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">{{trans('user.new_password')}}</label>
                            <input
                                type="password"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('password') }"
                                name="password"
                                v-model="form.password">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">{{trans('user.confirm_password')}}</label>
                            <input
                                type="password"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
                                name="password"
                                v-model="form.password_confirmation">
                            <has-error :form="form" field="password_confirmation"></has-error>
                        </div>
                    </div>
                </template>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span @click="update">
                            <submit-button :loading="form.busy" :loading-text="trans('user.updating_profile')" :loaded-text="trans('update')"></submit-button>
                        </span>
                        <button class="btn btn-outline-danger btn-sm" @click.prevent="changingSecurity=true" v-if="! changingSecurity">{{trans('user.change_password')}}</button>
                        <button class="btn btn-outline-warning" @click.prevent="changingSecurity=false" v-if="changingSecurity">{{trans('cancel')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                editingMessaging: !this.user.messaging_id,
                changingSecurity: false,

                form: new Form({
                    name: this.user.name,
                    username: this.user.username,
                    email: this.user.email,
                    gender: this.user.gender,
                    password: null,
                    password_confirmation: null,
                    image_path: this.user.image,
                    phone_number: this.user.phone_number,
                    default_locale: this.user.default_locale,
                    messaging_id: this.user.messaging_id,
                })
            }
        },

        computed: {
            validForm() {
                return !! (this.form.name && this.form.username && this.form.email);
            }
        },

        methods: {
            setSelectedGender(value) {
                this.form.gender = value.value;
            },

            cancelEditMessaging(){
                this.editingMessaging = false;
                this.form.messaging_id = this.user.messaging_id
            },

            update() {
                if(!this.validForm) {
                    this.$toast.warning(this.trans('invalid_inserted_data'));
                    return;
                }

                this.form.image_path = $("#avatar").val() ? $("#avatar").val() : null;

                this.validForm ? this.persist() : this.$toast.warning(this.trans('invalid_inserted_data'));
            },

            unlinkMessaging() {
              this.form.messaging_id = null;
              this.update();
            },

            persist() {
                $(".uploadcare--widget__button_type_remove").trigger('click');

                this.form.patch(location.pathname)
                    .then(({data}) => {
                        if(data.messaging_id) {
                            this.editingMessaging = false;
                        }
                        this.$emit('updated', data);
                        this.changingSecurity = false;;
                        this.form.password = null;
                        this.form.password_confirmation = null;
                        this.$toast.success(this.trans('profiles.updated'));
                    })
                    .catch(error => {
                        this.form.messaging_id = this.user.messaging_id;
                        this.$toast.error(error.response.data);
                    });
            }
        }
    }
</script>
