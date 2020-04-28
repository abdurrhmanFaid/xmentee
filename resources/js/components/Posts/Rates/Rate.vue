<template>
    <button class="btn btn-light waves-effect waves-light btn-sm btn-block">
        <span
            class="fa fa-star"
            v-for="index in 5"
            :class="index == localRate || localRate > index ? 'checked' : ''"
            @click="persist(index)">
        </span>
        <span
            v-text="trans('rates.remove')"
            class="badge badge-danger"
            @click="localRate=0;remove()"
            v-if="localRate">
        </span>
    </button>
</template>

<script>
    export default {
        props: ['currentUserRate'],
        data() {
            return {
                localRate: this.currentUserRate,
            }
        },

        methods: {
            persist(index) {
                if(this.localRate && index == this.localRate) {
                    return this.$toast.warning(
                        this.trans('rates.rates_are_same', {rate: this.localRate})
                    );
                } else {
                    let action = this.localRate ? 'patch' : 'post';
                    this.localRate = index;
                    // [only god knows what the hell i'm doing right here] but really i'm very tired to refactor this
                    axios[action](location.pathname + '/rates', {rate: this.localRate})
                        .then(({data}) => {
                            this.$emit('rate-changed', data);
                        });
                }
            },

            remove() {
                axios.delete(location.pathname + '/rates')
                    .then(({data}) => {
                        this.$emit('rate-changed', data);
                    });
            }
        }

    }
</script>

<style>
    .checked {
        color: orange
    }
</style>
