export default class CommentPolicy
{
    static update(userId, comment)
    {
        return userId == comment.user_id;
    }

    static delete(userId, comment)
    {
        return userId == comment.user_id;
    }
}
