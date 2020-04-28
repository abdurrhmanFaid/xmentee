<script>
    import Comments from './Comments/Collection';
    import SubscribeButton from './Subscriptions/Subscribe';
    import Rate from './Rates/Rate';

    export default {
        props: ['rate'],

        components: {
            Comments: Comments,
            Subscribe: SubscribeButton,
            Rate: Rate,
        },

        data () {
            return {
                loading: false,
                localPost: this.post,
                commentsCount: 0,
                localRate: this.rate,
            }
        },

        computed: {
            rateStatus() {
                if(this.localRate.raters) {
                    return this.trans('rates.status', {ratersCount: this.localRate.raters, average: this.localRate.average})
                }

                return this.localRate.average;
            }
        },

        methods: {
            refreshed(commentsCount) {
                this.commentsCount = commentsCount;
            },

            rateChanged(rate) {
                this.localRate = rate;
            },

            destroy() {
                console.log('here');
                this.loading = true;
                axios.delete(location.pathname)
                    .then(response => {
                        setTimeout(() => {
                            window.location = response.data.redirectUrl;
                        }, 200);
                        this.$toast.success(response.data.message);
                    });
            }
        }
    }
</script>

<style>
    [v-cloak] { display: none; }
</style>
