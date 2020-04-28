<template>
    <nav aria-label="Page navigation" id="paginator">
        <ul class="pagination">
            <li class="page-item" v-show="prev_page_url" @click.prevent="page--">
                <button class="page-link btn btn-soft-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> {{trans('pagination.prev')}}
                </button>
            </li>
            <li class="page-item" v-show="next_page_url" @click.prevent="page++">
                <button class="page-link btn btn-soft-secondary btn-sm">
                    <i class="fa fa-arrow-right"></i> {{trans('pagination.next')}}
                </button>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                page: this.data.current_page,
                prev_page_url: this.data.prev_page_url,
                next_page_url: this.data.next_page_url,
            }
        },

        watch: {
            page () {
                this.broadcast();
            },

            data (value) {
                this.prev_page_url = value.prev_page_url,
                this.next_page_url =  value.next_page_url
            }
        },

        created() {
            this.updateUrl();
        },

        methods: {
            broadcast() {
                this.$emit('changed', this.page);
                window.scrollTo(0, 0);
            },

            updateUrl() {
                // history.pushState(null, null, '?page=' + this.page);
            },
        }
    }
</script>

<style>
    .page-link{
        font-weight: bolder !important;
    }
</style>
