<script>
    import ProfileEditForm from './ProfileEditForm';

    export default {
        props: ['user'],

        components: {
            ProfileEditForm: ProfileEditForm,
        },

        data() {
            return {
                localUser: this.user,
            }
        },

        methods: {
            update(data) {
                this.localUser = data;
            }
        }
    }
</script>
