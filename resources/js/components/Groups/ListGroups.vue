<template>
    <div class="row">
        <div
            v-for="(filter, index) in filters"
            :key="index"
            @click="filterBy(filter)"
            class="col-lg-3 col-md-3">
            <div class="card" :class="selectedFilter==filter ? 'selected' : ''">
                <div class="card-body text-center">
                    <h6><i class="fa fa-first-order"></i> {{trans('groups.' + filter)}}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive" v-if="! loading && localGroups.length">
                <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap">
                    <tbody>
                        <tr v-for="(group, index) in filteredGroups">
                            <td v-text="index+1"></td>
                            <td>
                                <h6 class="mb-0">
                                    <a :href="'/groups/' + group.id">{{group.name}}</a>
                                </h6>
                                <span v-text="group.description"></span>
                            </td>
                            <td>
                                <span class="text-info">{{trans('groups.members_count', {members: group.members_count})}}</span>
                            </td>
                            <td>
                                <span class="badge badge-info"><i class="fa fa-circle"></i> {{ group.points }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12" v-if="!loading & !localGroups.length">
            <div class="alert alert-info">{{trans('groups.empty')}}</div>
        </div>
        <div class="col-md-12 text-center" v-if="loading">
            <loader/>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['batchId'],

        data() {
            return {
                filteredGroups: [],
                localGroups: [],
                loading: false,
                filters: [
                    'top_points',
                    'less_points',
                    'top_members_count',
                    'less_members_count'
                ],
                selectedFilter: null,
            }
        },

        watch: {
            batchId(value) {
                if(value) {
                    this.filteredGroups = this.localGroups.filter(group => group.batch_id == value);
                } else {
                    this.filteredGroups = this.localGroups;
                }
            }
        },

        mounted() {
            this.loading = true;
            axios.get(`/api/groups`)
                .then(({data}) => {
                    this.localGroups = data.data;
                    this.filteredGroups = this.localGroups;
                    this.loading = false;
                });

            this.$eventBus.$on('created', (group) => {
                this.localGroups.unshift(group);
            });
        },

        methods: {
            filterBy(filter) {
                if(this.selectedFilter == filter) {
                    this.selectedFilter = null;
                    this.filteredGroups = this.localGroups;
                } else {
                    this.selectedFilter = filter;
                }

                this.filteredGroups.sort((a, b) => {
                    if(filter == 'top_points') {
                        return b.points - a.points;
                    }
                    if(filter == 'less_points') {
                        return a.points - b.points;
                    }
                    if(filter == 'top_members_count') {
                        return b.members_count - a.members_count;
                    }
                    if(filter == 'less_members_count') {
                        return a.members_count - b.members_count;
                    }
                });
            },
        }
    }
</script>

<style>
    .selected {
        background: #0080ff;
        color: #fff;
    }
</style>
