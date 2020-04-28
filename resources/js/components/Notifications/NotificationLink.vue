<template>
    <a class="text-white" :href="link">
        <span><i :class="icon"></i></span>
        <span v-html="text"></span>
    </a>
</template>

<script>
    export default {
        props: ['link', 'text', 'icon'],
    }
</script>
