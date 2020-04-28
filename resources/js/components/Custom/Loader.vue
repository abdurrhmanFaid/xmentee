<template>
    <div>
        <div
            class="spinner-border"
            :width="width ? width : '3rem'"
            :height="height ? height : '3rem'"
            role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <template v-if="message">
            <span class="text-muted" v-text="message"></span>
        </template>
    </div>
</template>

<script>
    export default {
        props: ['width', 'height', 'message']
    }
</script>
