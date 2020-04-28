<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
                <div class="form-group">
                    <markdown-editor v-model="form.body"></markdown-editor>
                </div>
                <div class="form-group mt-2">
                    <button
                        class="btn btn-sm btn-wave"
                        :class="!form.visible_user ? 'btn-soft-danger':'btn-soft-primary'"
                        @click.prevent="form.visible_user=!form.visible_user">
                        <template v-if="!form.visible_user">
                            <i class="fa fa-user-secret"></i> {{trans('comments.will_be_hidden')}}
                        </template>
                        <template v-else>
                            <i class="fa fa-user"></i> {{trans('comments.will_be_visible')}}
                        </template>
                    </button>
                    <div class="d-flex justify-content-end">
                        <submit-button
                            :loading="form.busy"
                            btn-type="secondary"
                            :loading-text="trans('comments.commenting')"
                            :loaded-text="dataForm.title">
                        </submit-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['dataForm'],

        data() {
            return {
                loading: false,
                form: new Form({
                    body: this.dataForm.body,
                    visible_user: this.dataForm.visible,
                })
            }
        },

        methods: {
            submit() {
                if(!this.form.body) {
                    return this.$toast.error(this.trans('invalid_inserted_data'));
                }

                this.loading = true;
                this.dataForm.action == 'create' ? this.create() : this.update();
            },

            create() {
                this.form.post(`${location.pathname}/comments`)
                    .then(({data}) => {
                        this.$emit('created', data);
                        this.form.body = null;
                        this.$toast.success(this.trans('comments.created'));
                    })
            },

            update() {
                if(!this.dataForm.comment_id) return;

                this.form.patch(`${location.pathname}/comments/${this.dataForm.comment_id}`)
                    .then(({data}) => {
                        this.$emit('updated', data);
                        this.form.body = null;
                        this.$toast.success(this.trans('comments.updated'));
                    })
            }
        }
    }
</script>
