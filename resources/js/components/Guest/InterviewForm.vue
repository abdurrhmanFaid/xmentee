<template>
    <div>
        <template v-if="!student && ! finished">
            <div class="container" style="margin-top:100px">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card auth-page auth-card shadow-lg">
                            <div class="card-body text-center">
                                <h3>طلب الإنضمام إلي Squadrons</h3>
                                <p class="text-muted">دى هتكون اخر خطوة هتقوم بيها عشان تنضم للجروب.</p>
                                <div class="alert alert-dark-shadow">
                                    <form
                                        class="form-horizontal auth-form my-4"
                                        @submit.prevent="getStudentByTicket"
                                        @keydown="form1.onKeydown($event)">
                                        <div class="form-group">
                                            <label> كود تذكرتى هو ؟</label>
                                            <input type="text" name="ticket" class="form-control" placeholder="مثال ma_12" v-model="form1.ticket">
                                            <has-error :form="form1" field="ticket"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label> كلمة السر ؟</label>
                                            <input type="password" name="password" class="form-control" v-model="form1.password">
                                            <has-error :form="form1" field="password"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <submit-button :disabled="!form1.ticket||!form1.password" class="btn-block" :loading="form1.busy" loading-text="بياناتك بتتحمل دلوقتى" loaded-text="ادخل"></submit-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-if="loadingInterview">
            <div class="row">
                <div class="col-md-12 text-center center-screen">
                    <loader :message="'لحظة يا ' + student"></loader>
                </div>
            </div>
        </template>
        <div v-show="student && !loadingInterview" id="interview-form"></div>
    </div>
</template>

<script>
    import SubmitButton  from "../Custom/SubmitButton";
    import * as typeformEmbed from '@typeform/embed'

    export default {
        components: {
            SubmitButton: SubmitButton,
        },

        data() {
            return {
                started: false,
                finished: false,
                student: null,
                loadingInterview: null,
                form1: new Form({
                    ticket: null,
                    password: null,
                }),
            }
        },

        methods: {
            getStudentByTicket() {
                this.form1.post(`/bands/squadrons/online-interview/ticket`)
                    .then(response => {
                        this.student = response.data;
                        this.loadingInterview = true;
                        let el = document.getElementById('interview-form');

                        typeformEmbed.makeWidget(el, "https://abdurrahman790734.typeform.com/to/lmQurB?name=" + this.student + '&ticket=' + this.form1.ticket, {
                            hideFooter: true,
                            opacity: 0,
                        })

                        setTimeout(() => {
                            this.loadingInterview = false;
                        }, 2000);
                    })

                    .catch(error => {
                        this.form1.password = null;
                        this.$toast.error(error.response.data.errors.ticket[0]);
                    });
            },
        }
    }
</script>

<style>
    .center-screen {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 100vh;
    }

    #interview-form {
        background: #1e1e1e;
        width: 100%;
        height: 100vh;
    }
</style>
