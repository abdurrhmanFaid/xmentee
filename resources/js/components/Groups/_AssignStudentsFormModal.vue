<template>
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignStudentsModal">
            <i class="fa fa-user-plus"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="assignStudentsModal" tabindex="-1" role="dialog" aria-labelledby="assignStudentsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('groups.create')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="create" @keydown="form.onKeydown($event)">
                            <div class="form-group">
                                <label class="form-label">{{trans('groups.name')}}</label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('groups.description')}}</label>
                                <textarea class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.description"></textarea>
                                <has-error :form="form" field="description"></has-error>
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{trans('groups.select_batch')}}</label>
                                <vue-select
                                    name="band_id"
                                    :options="formattedBatches"
                                    v-model="selectedBatch"
                                    :class="{ 'is-invalid': form.errors.has('band_id') }">
                                </vue-select>
                                <has-error :form="form" field="band_id"></has-error>
                            </div>
                            <div class="form-group">
                                <button :disabled="form.busy" type="submit" class="btn btn-primary">{{trans('save')}}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('close')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
    import VueSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';

    export default {
        props: ['batches'],

        components: {
            VueSelect,
        },

        data() {
            return {
                selectedBatch: null,
                form: new Form({
                    name: null,
                    description: null,
                    batch_id: null,
                })
            }
        },

        watch: {
            'selectedBatch'(value) {
                if(value) this.form.batch_id = value.value;
            }
        },

        computed: {
            validForm() {
                return !! (this.form.name && this.form.description && this.form.batch_id);
            },

            formattedBatches() {
                return this.batches.map((batch) => {
                    return {
                        label: batch.name,
                        value: batch.id,
                    }
                });
            }
        },

        methods: {
            create() {
                this.validForm ? this.persist() : this.$toasted.error(this.trans('invalid_inserted_data'));
            },

            persist() {
                this.form.post('groups')
                    .then(response => {
                        $("#createGroupModal").modal('hide');
                        this.$eventBus.$emit('created', response.data);
                        this.form.reset();
                    })
                    .catch(error => {

                    });
            }
        },
    }
</script>
