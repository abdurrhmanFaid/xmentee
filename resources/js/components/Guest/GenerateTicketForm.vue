<template>
    <div class="">
        <form
            class="form-horizontal auth-form my-4"
            @submit.prevent="generate"
            @keydown="form.onKeydown($event)"
            v-if="!code">
            <div v-if="selectedBand" class="alert alert-info-shadow">
                <h3><b>{{selectedBand.label}}</b></h3>
                <p v-text="selectedBand.description"></p>
                <span class="d-block mb-1">
                    <b>
                         <i class="fa fa-clock"></i> {{trans('created_at')}}
                    </b>:
                    {{selectedBand.created_at}}
                </span>
                <span class="d-block mb-3">
                         <b><i class="fa fa-users"></i> {{trans('bands.consist_of')}}</b>
                        ({{selectedBand.members_count}}) {{selectedBand.members_count > 1 ? trans('tickets.people') : trans('tickets.person')}}
                </span>
                <hr>
                <span class="d-block mb-1">
                    <b><i class="fa fa-address-card"></i> {{trans('tickets.address')}}</b>:
                    {{selectedBand.address}}
                </span>
                <span class="d-block mb-1">
                    <b><i class="fa fa-calendar"></i> {{trans('tickets.last_submit_date')}}</b>:
                    {{selectedBand.deadline}}
                </span>
                <span class="d-block">
                    <b><i class="fa fa-user-plus"></i> {{trans('tickets.applying_status')}}</b>
                    <span class="badge" :class="selectedBand.applying_open ? 'badge-success' : 'badge-warning'">
                        {{selectedBand.applying_open ? trans('tickets.open') : trans('tickets.close')}}
                    </span>
                </span>
            </div>

            <div class="form-group">
                <vue-select
                    id="bandSelector"
                    name="band_id"
                    :placeholder="trans('tickets.select_band')"
                    :options="bands"
                    v-model="selectedBand"
                    :class="{ 'is-invalid': form.errors.has('band_id') }">
                </vue-select>
                <has-error :form="form" field="band_id"></has-error>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-user"></i> </span>
                    <input
                        id="owner_name"
                        v-model="form.owner_name"
                        type="text"
                        name="owner_name"
                        :placeholder="trans('tickets.enter_full_name')"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('owner_name') }">
                    <has-error :form="form" field="owner_name"></has-error>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-lock"></i> </span>
                    <input
                        v-model="form.password"
                        type="text"
                        name="password"
                        :placeholder="trans('tickets.ticket_pass_key')"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
                </div>
                <small v-show="form.password" class="badge badge-soft-success">{{trans('tickets.ticket_pass_key_for')}}</small>
            </div>


            <div class="form-footer text-center">
                <button
                    :disabled="form.busy || !validForm"
                    type="submit"
                    class="btn btn-primary btn-round btn-block waves-effect waves-light">
                    <div v-if="form.busy" class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                     <template v-else>
                         <i class="fa fa-check"></i> {{trans('tickets.get_my_ticket')}}
                     </template>
                </button>
            </div>
        </form>
        <div v-else>
            <strong>{{trans('tickets.hey')}} {{form.owner_name}}, {{trans('tickets.your_ticket_code_is')}}</strong><hr>
            <div class="alert alert-dark">
                <h2 v-text="code" style="font-weight:bolder;"></h2>
            </div>
        </div>
        <div class="mt-10 mb-10">
            <i class="fa fa-exclamation-circle fa-"></i>
            <small class="text-muted-dark">
                 {{trans('tickets.dont_forget_ticket')}}
            </small>
        </div>
    </div>
</template>

<script>
    import VueSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';

    export default {
        props: ['bands'],

        components: {
            VueSelect: VueSelect
        },

        data() {
            return {
                code: null,
                selectedBand: null,
                form: new Form({
                    owner_name: null,
                    password: null,
                    band_id: null,
                })
            }
        },

        mounted() {
            if(window.Init.dir == 'rtl') {
                $('.vs__selected-options input').css('text-align', 'right');
            }
        },

        watch: {
            'selectedBand'(band) {
                if(band && band.value) this.form.band_id = band.value;
            }
        },

        computed: {
            validForm() {
                return !! (this.form.owner_name && this.form.password && this.form.band_id);
            },
        },

        methods: {
            generate() {
                this.validForm ? this.persist() : this.invalidFormErr();
            },

            invalidFormErr() {
                this.$toast.info(this.trans('invalid_inserted_data'), {
                    icon: 'exclamation-triangle'
                });
            },

            persist() {
                this.form.post(location.pathname)
                    .then(({data}) => {
                        this.code = data.code;
                        this.form.owner_name = data.owner_name;
                        this.$toast.success(data.message);
                    })
                    .catch(error => {
                        this.$toast.error(this.trans('something_went_wrong'));
                    });
            }
        }
    }
</script>

<style>
    .band-details {
        background: #fbfbfb;
        padding: 10px;
        margin-bottom: 10px;
        margin-top: 10px;
        border-radius: 10px 0;
    }

    .vs__dropdown-toggle {
        border: .6px solid #e6e3e3;
        padding: 7px;
        border-radius: 14px;
    }
</style>
