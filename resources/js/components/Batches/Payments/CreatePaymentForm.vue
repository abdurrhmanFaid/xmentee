<template>
    <div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <ol class="c-progress-steps">
                            <li
                                v-for="(step, index) in steps"
                                @click="currentStep > index+1 ? currentStep=index+1 : ''"
                                class="c-progress-steps__step"
                                :class="[index+1 == currentStep ? 'current' : '']">
                                <span>{{step.title}}</span>
                            </li>
                        </ol>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <div v-if="currentStep==1" class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <select v-model="form.batch_id" class="form-control">
                            <option value="" v-text="trans('payments.choose_batch')"></option>
                            <option v-for="batch in batches" :value="batch.id" v-text="batch.name"></option>
                        </select>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary" :disabled="!form.batch_id" v-text="trans('pagination.next')" @click="currentStep=2"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else-if="currentStep==2" class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label v-text="trans('payments.title')"></label>
                            <input v-model="form.title" class="form-control">
                            <small class="text-danger" v-if="!validTitle" v-text="trans('payments.invalidTitle')"></small>
                        </div>
                        <div class="form-group">
                            <label v-text="trans('payments.description')"></label>
                            <textarea v-model="form.description" class="form-control"></textarea>
                            <small class="text-danger" v-if="!validDescription" v-text="trans('payments.invalidDescription')"></small>
                        </div>
                        <div class="form-group">
                            <div class="checkbox my-2">
                                <div class="custom-control custom-checkbox">
                                    <input v-model="form.paid" type="checkbox" class="custom-control-input" id="isPaidId" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="isPaidId" v-text="trans('payments.paid')"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label v-text="trans('payments.value')"></label>
                                    <input v-model="form.value" class="form-control">
                                    <small class="text-danger" v-if="!validValue" v-text="trans('payments.invalidValue', {currency: this.form.currency})"></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label v-text="trans('payments.currency')"></label>
                                <select v-model="form.currency" class="form-control">
                                    <option value="LE" v-text="'LE'"></option>
                                    <option value="USD" v-text="'USD'"></option>
                                </select>
                            </div>
                        </div>
                        <div class="row" v-if="!form.paid">
                            <div class="col-md-6">
                                <label v-text="trans('payments.deadline')"></label>
                                <input v-model="form.deadline" type="date" class="form-control">
                                <small class="text-danger" v-if="!validDeadline" v-text="trans('payments.invalidDeadline')"></small>
                            </div>
                            <div class="col-md-6 text-center">
                                <template v-if="form.alarm_notification_date">
                                    <label v-html="trans('payments.alarm_notification_date')"></label>
                                    <input v-model="form.alarm_notification_date" type="date" class="form-control"><br>
                                    <a href="#" class="btn btn-block btn-sm btn-soft-danger d-block" @click.prevent="form.alarm_notification_date=null" v-text="trans('payments.remove_alarm_date')"></a>
                                    <small class="text-danger" v-if="!validAlarmDate" v-text="trans('payments.invalidAlarmDate')"></small>
                                </template>
                                <template v-else>
                                    <br>
                                    <a href="#" class="btn btn-block btn-sm btn-soft-success d-block" @click.prevent="form.alarm_notification_date=today()" v-text="trans('payments.add_alarm_date')"></a>
                                </template>
                            </div>
                        </div>
                        <div class="row" v-else>
                            <div class="col-md-6">
                                <label v-text="trans('payments.was_paid_at')"></label>
                                <input v-model="form.paid_at" type="date" class="form-control">
                                <small class="text-danger" v-if="!validPaidAt" v-text="trans('payments.invalidPaidAt')"></small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button
                                class="btn btn-sm btn-success"
                                v-text="trans('pagination.next')"
                                :disabled="!validPayment"
                                @click.prevent="moveToStep(3)"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else-if="currentStep==3" class="row">
            <div v-if="loadingStudents" class="col-md-12 text-center">
                <loader :message="trans('payments.loading_students', {batch: selectedBatch.name})"></loader>
            </div>
            <div v-else class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 mb-3 header-title">
                        {{trans('payments.batch_students', {batch:selectedBatch.name})}}
                        <span class="float-right" @click="submit">
                            <submit-button :loading="submitting" :loaded-text="trans('payments.submit')" :loading-text="trans('payments.submitting')"/>
                        </span>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-12"><p class="mb-0 p-2"><b v-text="form.title"></b></p></div>
                        <div class="col-md-12"><p class="mb-0 p-2" v-text="form.description"></p></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th v-text="trans('user.name')"></th>
                                <th v-text="trans('user.phone_number')"></th>
                                <th v-text="trans('payments.value')"></th>
                                <th v-text="trans('payments.was_paid')"></th>
                                <th v-text="trans('payments.dates')"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="student in batchStudents" :key="student.id" :class="student.checked ? 'std-checked' : ''">
                                <td>
                                    <input
                                        type="checkbox"
                                        class="form-control"
                                        :checked="student.checked"
                                        @click="student.checked=!student.checked"
                                        data-parsley-multiple="groups"
                                        data-parsley-mincheck="2">
                                </td>
                                <td>
                                    <img :src="student.formattedImage" :title="student.name" class="rounded-circle thumb-sm mr-1">
                                    <a :href="'/profile/' + student.username">{{student.name}}</a>
                                </td>
                                <td>
                                    <template v-if="student.profile.phone_number">
                                        <i class="fa fa-phone"></i> {{student.phone_number}}
                                    </template>
                                    <template v-else>
                                        <span class="badge badge-warning">
                                            <i class="fa fa-phone"></i> {{trans('user.no_phone_number')}}
                                        </span>
                                    </template>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th v-text="trans('payments.value')"></th>
                                            <th v-text="trans('payments.custom_value')"></th>
                                            <th v-text="trans('payments.deficiency')"></th>
                                            <th v-text="trans('payments.final_value')"></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fa fa-money-bill-wave"></i> {{form.value + ' ' + form.currency}}
                                            </td>
                                            <td>
                                                <i class="fa fa-money-bill-wave"></i> {{customValue(student) ? customValue(student) + " " + form.currency : trans('payments.no_custom_value')}}
                                            </td>
                                            <td>
                                                <i class="fa fa-money-bill-wave"></i> {{customValue(student) ? customValue(student) - form.value : 0}} {{form.currency}}
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" :value="customValue(student) ? customValue(student) : form.value" @change="changeCustomValue($event, student)">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input checked"
                                            :id="'paidId-'+student.id"
                                            :checked="student.payment.paid"
                                            @click="student.payment.paid=!student.payment.paid"
                                            data-parsley-multiple="groups"
                                            data-parsley-mincheck="2">
                                        <label
                                            class="custom-control-label"
                                            :for="'paidId-'+student.id" v-text="student.payment.paid ? trans('payments.prepaid') : trans('payments.unpaid')">
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <template v-if="student.payment.paid">
                                        <label v-text="trans('payments.paid_at_date')"></label>
                                        <input type="date" class="form-control" :value="student.payment.paid_at" @change.prevent="changePaidAt($event, student)">
                                    </template>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end /table-->
                    </div>
                    <!--end /tableresponsive-->
                </div>
                <!--end card-body-->
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['batches'],

        data() {
            return {
                loadingStudents: false,
                submitting: false,
                currentStep: 1,
                batchStudents: [],
                steps: [
                    {title: this.trans('payments.choose_batch')},
                    {title: this.trans('payments.details')},
                    {title: this.trans('payments.assign')},
                ],

                form: {
                    batch_id: "",
                    title: "",
                    description: "",
                    value: 100,
                    currency: 'LE',
                    deadline: this.today(),
                    alarm_notification_date: null,
                    paid: false,
                    paid_at: this.today(),
                },
            }
        },

        watch: {
            'form.batch_id'(value) {
                if(value) {
                    this.currentStep = 2;
                }
            }
        },

        computed: {
            selectedBatch() {
              return this.batches.find(b => b.id == this.form.batch_id);
            },

            validTitle() {
                return this.form.title.length > 1 && this.form.title.length < 120;
            },

            validDescription() {
                return this.form.description.length < 1000;
            },

            validValue() {
                return this.form.value >= 5;
            },

            validPaid() {
                return typeof this.form.paid == 'boolean';
            },

            validCurrency () {
                return this.form.currency == 'LE' || this.form.currency == 'USD';
            },

            validDeadline () {
                return this.form.deadline >= this.today();
            },

            validAlarmDate() {
                return !this.form.alarm_notification_date || (this.form.alarm_notification_date < this.form.deadline && this.form.alarm_notification_date > this.today());
            },

            validPaidAt() {
                return this.form.paid_at <= this.today();
            },

            validPayment() {
                return this.validTitle && this.validDescription && this.validPaid && this.validCurrency && this.validDeadline && this.validAlarmDate && this.validPaidAt;
            }
        },

        methods: {
            today() {
                return new Date().toJSON().slice(0,10);
            },

            moveToStep(step) {
                this.currentStep = step;
                if(step == 3 && !this.batchStudents.length) {
                    this.loadingStudents = true;
                    this.loadStudents();
                }
            },

            loadStudents() {
                axios.get(`/api/batches/${this.form.batch_id}/students`)
                .then(({data}) => {
                    this.studentsLoaded(data.data);
                });
            },

            studentsLoaded(students) {
                this.loadingStudents = false;
                if(!students.length) {
                    this.$toast.warning(this.trans('batches.zero_students'));
                    this.moveToStep(1);
                    return;
                }

                this.batchStudents = this.addCustomProps(students);
                this.formatSelectedStudents();
            },

            addCustomProps(students) {
                students.forEach(student => {
                    student.checked = true;
                    student.payment = {};
                    student.payment.paid = this.form.paid;
                    student.payment.paid_at = this.form.paid_at;
                    student.payment.value = student.profile.custom_payment_value ? student.profile.custom_payment_value : this.form.value;
                });

                return students;
            },

            customValue(student) {
                return student.profile.custom_payment_value;
            },

            changeCustomValue(e, student) {
                let value = e.target.value;
                student.payment.value = value;
            },

            changePaidAt(e, student) {
                let value = e.target.value;
                student.payment.paid_at = value;
            },

            formatSelectedStudents() {
                let formattedStudents = this.batchStudents.map(student => {
                    if(student && student.checked) {
                        return {
                            id: student.id,
                            payment: student.payment,
                        };
                    }
                });


                return formattedStudents.filter(i => {return i;});
            },

            submit() {

                if(!this.validPayment) {
                    this.$toast.warning(this.trans('invalid_inserted_data'));
                    return;
                }

                if(!this.formatSelectedStudents().length) {
                    this.$toast.warning(this.trans('choose_one_at_least'));
                    return;
                }

                this.submitting = true;

                this.persist();
            },

            persist() {
                axios.post(`/payments`, {
                    ...this.form,
                    std_payment: this.formatSelectedStudents(),
                }).then(response => {
                    this.$toast.success(this.trans('payments.assigned'));
                    setTimeout(() => {
                        window.location = response.data.redirectUrl;
                    }, 300);
                });
            }
        }
    }
</script>

<style>
    td table {
        background: #ececec;
        color: #000;
        border-radius: 10px;
        width: 100%;
    }

    td table tr td {
        background: #d1cdcd;
        color: #ea6c5f;
        font-weight: bold;
    }

    .std-checked {
        background-color: #f1f5fa;
    }
</style>
