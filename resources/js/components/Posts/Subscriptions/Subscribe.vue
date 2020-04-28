<template>
    <button type="button" @click.prevent="submit" class="btn waves-effect waves-light btn-sm btn-block" :class="isSubscribed ? 'btn-primary' : 'btn-light'">
        <i class="fa" :class="isSubscribed ? 'fa-minus' : 'fa-plus'"></i> {{isSubscribed ? trans('posts.following') : trans('posts.follow')}}</button>
</template>

<script>
    export default {
        props: ['subscribed'],

        data() {
            return {
                isSubscribed: this.subscribed,
            }
        },

        methods: {
            submit() {
                this.isSubscribed = ! this.isSubscribed;



                // reverse of reverse
                axios[this.isSubscribed ? 'post' : 'delete'](`${location.pathname}/subscriptions`)
                    .then(({data}) => {
                        if(data.message) {
                            this.$toast.success(this.isSubscribed ? 'You are following this post' : 'You unfollowed this post');
                        }
                    })
                    .catch(error => {
                        this.isSubscribed = ! this.isSubscribed;
                        this.trans('something_went_wrong');
                    });
            }
        }
    }
</script>
