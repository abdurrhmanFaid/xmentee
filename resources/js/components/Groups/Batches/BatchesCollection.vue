<template>
    <div class="section-body">
        <h6 class="text-muted">Filter by batch</h6>
        <div class="row clearfix mt-2">.
            <div
                @click="selected(batch.id)"
                v-for="batch in batches"
                :key="batch.id"
                class="col-lg-3 col-md-6">
                <div class="card" :class="selectedBatch==batch.id ? 'selected' : ''">
                    <div class="card-body text-center">
                        <h6 v-text="batch.name"></h6>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                selectedBatch: null,
                batches: [],
            }
        },

        mounted() {
            axios.get('/api/batches')
                .then(({data}) => {
                    this.batches = data.data;
                    this.$emit('fetched', data.data);
                });
        },

        methods: {
            selected(value) {
                if(this.selectedBatch == value) {
                    this.selectedBatch = null;
                } else {
                    this.selectedBatch = value;
                }
                this.$emit('selected', value);
            }
        }
    }
</script>

<style>
    .selected {
        background: #0080ff;
        color: #fff;
    }
</style>
