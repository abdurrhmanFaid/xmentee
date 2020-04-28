<template>
    <button class="btn btn-sm" :class="btnType ? 'btn-'+btnType: 'btn-primary'" type="submit" :disabled="loading">
        <span v-show="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        {{ loading ? loadingText ? loadingText : trans('loading') : loadedText ? loadedText : trans('posts.post') }}
    </button>
</template>

<script>
    export default {
        props: ['loading', 'loadingText', 'loadedText', 'btnType'],
    }
</script>
