<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="update" @keydown="form.onKeydown($event)">
                <div class="d-flex justify-content-end">
                    <submit-button :loading="form.busy" :loading-text="trans('editing')" :loaded-text="trans('edit')"></submit-button>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">{{trans('posts.title')}} <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <input
                            v-model="form.title"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('title') }"
                            type="text"
                            name="title"
                            :placeholder="trans('posts.title_desc')">
                        <has-error :form="form" field="title"></has-error>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">{{trans('categories.category')}} <span class="text-danger">*</span></label>
                    <div class="col-md-4 text-center">
                        <select
                            v-model="form.category_id"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('category_id') }"
                            name="category_id">
                            <option v-for="category in categories" :value="category.id" v-text="category.name"></option>
                        </select>
                        <has-error :form="form" field="category_id"></has-error>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">{{trans('posts.type')}} <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <select
                            v-model="form.type"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('type') }"
                            name="type">
                            <option v-for="type in postTypes" :value="type" v-text="trans('posts.types.' + type)"></option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <markdown-editor
                                    :class="{ 'is-invalid': form.errors.has('body') }"
                                    name="body"
                                    v-model="form.body">
                                </markdown-editor>
                                <has-error :form="form" field="body"></has-error>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    import TurnDown from 'turndown';
    import 'v-markdown-editor/dist/index.css';
    import Editor from 'v-markdown-editor'

    export default {
        props: ['categories', 'post'],

        data() {
            return {
                postTypes: ['question', 'information', 'advice', 'other'],
                form: new Form({
                    title: this.post.title,
                    category_id: this.post.category_id,
                    type: 'question',
                    body: this.turndown(this.post.body),
                })
            }
        },

        computed: {
            validForm() {
                return this.form.title && this.form.category_id && this.form.type && this.form.body;
            }
        },

        methods: {
            update() {
                !this.validForm ? this.alarmInvalid() : this.persist();
            },

            turndown(htmlContent) {
                var turndownService = new TurnDown();

                return turndownService.turndown(htmlContent);
            },

            alarmInvalid() {
                if(!this.categories.length) {
                    this.$toast.info(this.trans('categories.empty'))
                } else {
                    this.$toast.error(this.trans('invalid_inserted_data'))
                }
            },

            persist() {
                this.form.patch(`/posts/${this.post.slug}`)
                    .then(response => {
                        this.$toast.success(this.trans('posts.updated'));
                        setTimeout(() => {
                            window.location = response.data.redirectUrl;
                        }, 200);
                    });
            }
        }
    }
</script>
