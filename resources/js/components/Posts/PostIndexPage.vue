<script>
    import Paginator from '../Pagination/Paginator';

    export default {
        props: ['categories'],

        components: {
            Paginator: Paginator
        },

        data() {
            return {
                loading: false,
                posts: [],
                data: [],
                queries: {
                    categories: this.match('categories') ? [this.match('categories')] : [],
                    types: this.match('types') ? [this.match('types')] : [],
                    by: this.match('by') ? this.match('by') : 0,
                    unanswered: 0,
                    latest: 1,
                }
            }
        },
        mounted() {
            this.fetch();
        },

        methods: {
            fetch(page) {
                this.loading = true;

                axios.get(this.url(isNaN(page) ? null : page))
                    .then(this.refresh)
            },

            refresh(response) {
                this.posts = response.data.data;
                this.data = response.data;
                this.loading = false;
            },
            match(request) {
                const params = new Map(location.search.slice(1).split('&').map(kv => kv.split('=')));

                return params.get(request) ? params.get(request) : null;
            },

            url(page) {
                if (!page) {
                    let query = this.match('page');
                    page = query ? query : 1;
                }

                return `${location.pathname}?categories=${this.queries.categories}&types=${this.queries.types}&by=${this.queries.by}&latest=${this.queries.latest}&unanswered=${this.queries.unanswered}&page=${page}`;
            },

            addCategoryScope (categoryId) {
                this.push(this.queries.categories, categoryId);
            },

            addTypeScope(type) {
                this.push(this.queries.types, type);
            },

            push(array, item) {
                if(array.includes(item.toString()) || array.includes(item)) {
                    array.splice(array.indexOf(item), 1);
                } else {
                    array.push(item);
                }
            },

            byMe() {
                if(this.queries.by) {
                    this.queries.by = null;
                } else {
                    this.queries.by = window.Init.username;
                }
            }
        }
    }
</script>

<style>
    [v-cloak] { display: none; }
</style>
