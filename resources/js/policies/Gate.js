import CommentPolicy from './CommentPolicy';

export default class Gate
{
    constructor(user)
    {
        this.user = user;

        this.policies = {
            comment: CommentPolicy
        };
    }

    allow(action, type, model = null)
    {
        return this.policies[type][action](this.user, model);
    }

    deny(action, type, model = null)
    {
        return ! this.allow(action, type, model);
    }
}
