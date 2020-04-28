<template>
    <div :class="loading ? 'text-center' : ''">
        <loader v-if="loading" width="1" height="1" />
        <template v-else>
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-outline-light" @click="commenting=!commenting">
                        <template v-if="commenting">
                            <i class="fa fa-comment"></i> {{trans('posts.comments.view')}}
                        </template>
                        <template v-else>
                            <i class="fa fa-pencil-alt"></i> {{trans('posts.comments.create')}}
                        </template>
                    </button>
                </div>
                <div class="card-body">
                    <comment-form v-if="commenting" @created="created" @updated="updated" :data-form="dataForm"></comment-form>
                    <template v-else>
                        <h4 class="header-title mt-0 mb-3">{{trans('comments.name')}} ({{dataComments.total}})</h4>
                        <template v-if="comments.length">
                            <comment
                                v-for="(comment, index) in comments"
                                :key="index"
                                :comment="comment"
                                @replying="replying"
                                @editing="editing">
                            </comment>
                        </template>
                        <template v-else>
                            <div class="alert alert-dark-shadow" v-text="trans('comments.empty')"></div>
                        </template>
                    </template>
                </div>
            </div>
            <paginator
                v-if="comments.length"
                :data="dataComments"
                @changed="fetch"
                style="width: 10%; margin:auto"></paginator>
        </template>
    </div>
</template>

<script>
    import Comment from './Comment';
    import CommentForm from './CommentForm';
    import Paginator from '../../Pagination/Paginator';

    export default {

        components: {
            Comment: Comment,
            Paginator: Paginator,
            CommentForm: CommentForm,
        },

        data() {
            return {
                loading: false,
                comments: [],
                dataComments: [],
                commenting: false,
                dataForm: {
                    comment_id: null,
                    body: null,
                    visible: true,
                    action: 'create',
                    title: this.trans('comments.create')
                },
            }
        },

        mounted() {
            this.fetch();
        },

        watch: {
            commenting(value) {
                if(!value) this.dataForm.body = null;
            }
        },

        methods: {
            fetch(page = null) {
                this.loading = true;

                return axios.get(this.url(page))
                    .then(this.refresh);
            },

            url(page) {
                page = page ? page : 1;
                return `${location.pathname}/comments?page=${page}`;
            },

            refresh(response) {
                this.comments = response.data.data;
                this.dataComments = response.data;
                this.loading = false;
                this.commenting = false;
                this.$emit('refreshed', this.dataComments.total);
            },

            created(comment) {
                // this.fetch();
                this.comments.unshift(comment);
                this.commenting = false;
                this.dataComments.total = this.dataComments.total + 1;
                this.$emit('refreshed', this.dataComments.total);
            },

            updated(comment) {
                this.comments.splice(
                    this.comments.findIndex(c => c.id == comment.id),
                    1,
                    comment
                )
                this.commenting = false;
            },

            replying(username) {
                this.dataForm.body = '@' + username + ' ';
                this.commenting = true;
            },

            editing(data) {
                this.dataForm = {
                    comment_id: data.comment_id,
                    body: data.body,
                    visible: data.visible,
                    action: 'update',
                    title: this.trans('posts.comments.edit'),
                };

                this.commenting = true;
            },

        }
    }
</script>
