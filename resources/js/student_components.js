Vue.component('notifications', require('./components/Notifications/Collection.vue').default);
Vue.component('owner-profile-page', require('./components/Profiles/OwnerProfilePage.vue').default);
Vue.component('groups-page', require('./components/Groups/GroupsPage.vue').default);

/**
 * Posts
 */
Vue.component('post-index-page', require('./components/Posts/PostIndexPage.vue').default);
Vue.component('post-page', require('./components/Posts/PostPage.vue').default);
Vue.component('create-post-form', require('./components/Posts/CreatePostForm.vue').default);
Vue.component('edit-post-form', require('./components/Posts/EditPostForm.vue').default);

/**
 * Lessons
 */
Vue.component('lessons', require('./components/Lessons/Collection.vue').default);

Vue.component('points', require('./components/Points/Collection.vue').default);
Vue.component('loader', require('./components/Custom/Loader.vue').default);
Vue.component('submit-button', require('./components/Custom/SubmitButton.vue').default);

