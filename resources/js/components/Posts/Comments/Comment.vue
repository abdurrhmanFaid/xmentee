<template>
    <div class="activity">
        <img :src="comment.owner.formattedImage" class="img rounded-circle" style="transform: rotate(0)" :title="comment.owner.name">
        <div class="time-item">
            <div class="item-info">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0">
                        <template v-if="comment.owner.username">
                            <a
                                class="d-block"
                                :href="'/profile/' + comment.owner.username">
                                {{comment.owner.name}} ({{comment.owner.points}})
                            </a>
                            <span class="text-muted" v-text="comment.owner.formattedUsername"></span>
                        </template>
                        <template v-else>
                            <a href="#" class="tag tag-warning" v-text="comment.owner.name"></a>
                        </template>
                    </h6>
                    <span class="text-muted">{{comment.created_at}}</span>
                </div>
                <p class="mt-3" v-html="comment.body"></p>

                <a href="#" class="badge badge-danger waves-effect waves-light btn-sm " @click.prevent="remove" v-if="$gate.allow('delete', 'comment', comment)">
                    <i class="fa fa-trash"></i>
                </a>
                <a href="#" class="badge badge-primary waves-effect waves-light btn-sm" @click.prevent="edit" v-if="$gate.allow('update', 'comment', comment)">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="badge badge-success waves-effect waves-light btn-sm" @click.prevent="reply(comment.owner.username)" v-if="currentUserCanReply">
                    <i class="fa fa-reply"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import TurnDown from 'turndown';


    export default {
        props: ['comment'],

        computed: {
            currentUserCanReply() {
                return this.comment.owner.username && this.$gate.deny('update', 'comment', this.comment);
            }
        },

        methods: {

            remove(index) {
                $(this.$el).fadeOut(() => {
                    this.$toast.info(this.trans('comments.deleted'));
                });

                axios.delete(`${location.pathname}/comments/${this.comment.id}`)
            },

            edit(comment) {
                var turndownService = new TurnDown();

                this.$emit('editing', {
                    comment_id: this.comment.id,
                    body: turndownService.turndown(this.comment.body),
                    visible: !! this.comment.owner.username,
                });
            },

            reply(username) {
                this.$emit('replying', username);
            }
        }
    }
</script>
