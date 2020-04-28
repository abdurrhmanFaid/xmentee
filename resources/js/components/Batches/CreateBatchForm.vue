<template>
    <form @submit.prevent="create" @keydown="form.onKeydown($event)">
        <div class="row">
            <div class="col-md-12">
                <span
                    class="badge"
                    :class="form.paid ? 'badge-success' : 'badge-default'"
                    v-text="form.paid ? trans('batches.paid') : trans('batches.unpaid')">
                </span>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="batchName">{{trans('batches.name')}}</label>
                    <input
                        v-model="form.name"
                        id="batchName"
                        type="text"
                        name="name"
                        :placeholder="trans('batches.name_placeholder')"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <label class="form-label"></label>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="paid" v-model="form.paid" class="custom-control-input" />
                        <span class="custom-control-label">{{trans('batches.paid')}}</span>
                    </label>
                </div>
            </div>
            <template v-if="form.paid">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" v-text="trans('batches.default_paying_amount')"></label>
                        <input
                            v-model="form.default_paying_amount"
                            type="number"
                            min="5"
                            name="default_paying_amount"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('paid_for_center_per_session') }">
                        <has-error :form="form" field="default_paying_amount"></has-error>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" v-show="form.default_paying_amount > 0">
                    <div class="card">
                        <div
                            class="card-body"
                            v-html="trans('batches.default_paying_amount_desc', {amount: this.form.default_paying_amount})"
                            >
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right m-t-20">
                <button :disabled="form.busy" type="submit" class="btn btn-outline-primary">
                    <template v-if="form.busy">
                        <loader height="1" width="1"></loader>
                    </template>
                    <template v-else>
                        <i class="fa fa-check"></i> {{trans('batches.save')}}
                    </template>
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    name: 'First Batch',
                    paid: false,
                    default_paying_amount: 0,
                }),
            }
        },

        watch: {
            'form.paid' (value) {
                if(value) {
                    this.form.default_paying_amount = 5;
                } else {
                    this.formdefault_paying_amount = 0;
                }
            }
        },

        computed: {
            validForm() {
                return this.form.name && this.form.default_paying_amount >= 0;
            },
        },

        methods: {
            create() {
                this.validForm ? this.persist() : this.$toast.warning(this.trans('invalid_inserted_data'));
            },

            persist() {

                this.form.post('/batches')
                    .then(response => {
                        this.$toast.success(response.data.message);
                        setTimeout(() => {
                            window.location = response.data.redirectUrl;
                        }, 500);
                    });
            }
        }
    }
</script>
