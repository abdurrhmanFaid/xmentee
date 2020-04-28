<template>
    <li>
        <a class="nav-link">
            <span class="btn btn-success btn-sm">
                <i class="fa fa-hand-point-up"></i> <strong>{{localPoints}}</strong>
            </span>
        </a>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                localPoints: window.Init.userPoints,
            }
        },

        mounted() {
            this.$eventBus.$on('pointsChanged', (value) => {
                this.localPoints += value;
            });
        },
    }
</script>
