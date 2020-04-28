import './student_components'
// Tickets
Vue.component('tickets', require('./components/Tickets/Collection.vue').default);
// Groups
Vue.component('group-members-form', require('./components/Groups/GroupMembersForm.vue').default);
// Batches
Vue.component('create-batch-form', require('./components/Batches/CreateBatchForm').default);
Vue.component('instructor-task-page', require('./components/Tasks/InstructorTaskPage.vue').default);

// Bands
Vue.component('telegram-setup-form', require('./components/Bands/TelegramSetupForm.vue').default);

// Payments
Vue.component('create-payment-form', require('./components/Batches/Payments/CreatePaymentForm.vue').default);
