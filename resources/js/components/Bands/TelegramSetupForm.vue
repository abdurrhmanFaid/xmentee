<template>
    <div>
        <template v-if="!localLinked">
            <div class="card">
                <h5 class="card-header bg-dark text-white mt-0">1- {{trans('bands.messaging.telegram.create_group')}}</h5>
                <div class="card-body">
                    <h4 class="card-title mt-0">{{trans('bands.messaging.telegram.create_group_desc', {band: band})}}</h4>
                </div><!--end card-body-->
            </div>
            <div class="card">
                <h5 class="card-header bg-dark text-white mt-0">2- {{trans('bands.messaging.telegram.add_bot_admin')}}</h5>
                <div class="card-body">
                    <h4 class="card-title mt-0" v-html="trans('bands.messaging.telegram.add_bot_admin_desc', {bot: botName})"></h4>
                </div><!--end card-body-->
            </div>
            <div class="card">
                <h5 class="card-header bg-dark text-white mt-0">3- {{trans('bands.messaging.telegram.write_identifier_msg')}}</h5>
                <div class="card-body">
                    <h4 class="card-title mt-0"  v-html="trans('bands.messaging.telegram.write_identifier_msg_desc', {msg: identifierMsg})"></h4>
                </div><!--end card-body-->
            </div>

            <span @click="link">
                <submit-button :loading="loading" :loadingText="trans('bands.messaging.telegram.linking')" :loadedText="trans('bands.messaging.telegram.link')"></submit-button>
            </span>
        </template>
        <template v-else>
            <div class="card card-border">
                <div class="text-center">
                    <img width="200" height="200" src="/images/messaging_linked.png">
                </div>
                <div class="card-body">
                    <h4 class="card-title mt-0">{{trans('bands.messaging.telegram.already_linked')}}</h4>
                    <p class="card-text text-muted ">{{trans('bands.messaging.telegram.already_linked_desc', {band: band})}}</p>
                    <a href="#"  @click.prevent="unlink" class="btn btn-danger">
                        {{loading ? trans('bands.messaging.telegram.unlinking') : trans('bands.messaging.telegram.unlink')}}
                    </a>
                </div><!--end card -body-->
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        props: ['band', 'identifierMsg', 'linked'],

        data() {
            return {
                loading: false,
                localLinked: this.linked,
            }
        },

        computed: {
            botName() {
                return window.Init.appName + "BOT";
            }
        },

        methods: {
            link() {
                this.submit({link: true});
            },

            unlink() {
                this.submit({link: false})
            },

            submit(data) {
                this.loading = true;
                axios.patch(location.pathname, data)
                    .then(response => {
                       this.success(response)
                    })
                    .catch(error => {
                        this.loading = false;
                        this.$toast.error(error.response.data.message);
                    });
            },

            success(response) {
                this.loading = false;
                this.$toast.success(response.data.message);
                this.localLinked = !this.localLinked;
            }
        }
    }
</script>


<style>
    .activity i {
        transform: rotate(0deg);
    }
</style>
