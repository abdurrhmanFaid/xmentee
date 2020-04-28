<template>
    <div class="card">
        <div class="card-header">
            {{trans('batches.students')}}
            <div class="card-options">
                <button v-if="!loading" class="btn btn-default mr-2" @click="load">
                    <i class="fa fa-refresh"></i>
                </button>
                <button class="btn btn-info" v-if="loaded && !loading && localStudentsIds.length" @click="update">
                    <i class="fa fa-edit"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div v-if="loaded && !loading" class="row">
                <template v-if="loaded">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="search" :placeholder="trans('search')">
                        </div>
                    </div>
                    <template v-if="searchResult.length">
                        <div
                            v-for="(student,index) in searchResult"
                            :key="index"
                            @click="toggleStudent(student.id)"
                            class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card" :class="localStudentsIds.includes(student.id) ? 'selected' : ''">
                                <div class="card-body text-center ribbon">
                                    <div class="ribbon-box green">
                                        <i class="fa fa-circle"></i>
                                        {{student.points}}
                                    </div>
                                    <img :src="student.avatar" :title="student.name" class="rounded-circle img-thumbnail w100">
                                    <h6 class="mt-3 mb-0">
                                        <a :href="'/profiles/'+student.username">
                                            {{student.name}}
                                        </a>
                                    </h6>
                                    <span class="d-block mb-3">{{student.formattedUsername}}</span>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="alert alert-warning col-md-12" v-else>
                        {{trans('batches.zero_students')}}
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['studentsIds', 'batchId', 'groupId'],

        data() {
            return {
                loaded: false,
                loading: false,
                search: null,
                students: [],
                searchResult: [],
                localStudentsIds: this.studentsIds,
            }
        },

        watch: {
            search(value) {
                if(! value) {
                    this.searchResult = this.students;
                } else {
                    this.searchResult = this.students.filter(
                        this.makeQuery('name', new RegExp(value+'.+$', 'i'))
                    );
                }
            },
        },

        methods: {

            makeQuery(property, regexp) {
                return function(elem, index, array) {
                    return elem[property].search(regexp) !== -1;
                };
            },

            load() {
                this.loading = true;
                axios.get(`/api/batches/${this.batchId}/students`)
                    .then(({data}) => {
                        this.students = data.data;
                        this.searchResult = this.students;
                        this.loaded = true;
                        this.loading = false;
                    });
            },

            toggleStudent(studentId) {
                if(! this.localStudentsIds.includes(studentId)) {
                    this.localStudentsIds.push(studentId);
                } else {
                    this.localStudentsIds.splice(
                        this.localStudentsIds.indexOf(s => s == studentId), 1
                    )
                }
            },

            update() {
                if(confirm(this.trans('groups.members.update_confirmation'))) {
                    axios.patch(`/groups/${this.groupId}/members`, {
                        members: this.localStudentsIds
                    }).then(response => {
                        this.$toasted.success(response.data.message)
                    })
                }
            }
        }
    }
</script>

<style>
    .selected {
        background: #163b5f;
        color: #fff;
    }

    .selected a {
        font-weight: bold;
    }
</style>
