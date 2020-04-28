<template>
    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <i class="fa fa-bell noti-icon"></i>
            <span class="badge badge-danger badge-pill noti-icon-badge">{{notifications.length}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
            <h6 class="dropdown-item-text">{{trans('notifications.name')}} ({{notifications.length}})</h6>
            <div class="slimscroll notification-list" style="height: 200px !important">
                <!-- item-->
                <a
                    v-for="notification in notifications"
                    :key="notification.id"
                    @click.prevent="readNotification(notification.id)"
                    class="dropdown-item notify-item">
                    <div class="notify-icon bg-success"><i :class="notification.data.icon ? notification.data.icon : 'fa fa-bell'"></i></div>
                    <p class="notify-details"><small class="text-muted" v-html="notification.data.message"></small></p>
                </a>
            </div>
            <!-- All-->
            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a>
        </div>
    </li>
</template>
<script>
    import VueSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';
    import NotificationLink from './NotificationLink';

    export default {
        components: {VueSelect, NotificationLink},

        data() {
            return {
                notifications: []
            }
        },

        mounted() {
            axios.get('/notifications').then(({data}) => this.notifications = data);

            Echo.private(`App.Models.User.${window.Init.userId}`)
                .notification((notification) => {
                    this.notify(notification)
                    this.notifications.unshift(notification);

                    if(notification.data.points) {
                        this.$eventBus.$emit('pointsChanged', notification.data.points);
                    }
                });
        },

        methods: {
            notify(notification) {

                const content = {
                    component: NotificationLink,

                    props: {
                        link: notification.data.link,
                        text: notification.data.message,
                        icon: notification.data.icon,
                    },
                };

                this.$toast.info(content);
            }
        }
    }
</script>
