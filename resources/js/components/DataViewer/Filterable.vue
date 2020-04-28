<template>
    <div class="filterable mb-20">
        <template>
            <div class="card">
                <slot name="actions"></slot>
                <div class="card-body">
                    <div class="row" v-if="!loading">
                        <div class="col-md-8 col-sm-12">
                            <div class="form-group d-inline">
                                <span>{{trans('filters.match')}}</span>
                                <select v-model="query.filter_match" style="width:10%">
                                    <option value="and">{{trans('filters.all')}}</option>
                                    <option value="or">{{trans('filters.any')}}</option>
                                </select>
                                <span>{{trans('filters.of_the_following')}}</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <a
                                href="#"
                                class="btn btn-info btnsm"
                                @click.prevent="addFilter">
                                <span><i class="fa fa-plus"></i> {{trans('filters.add_filter')}}</span>
                            </a>
                            <a
                                v-if="filterCandidates[0].column && filterCandidates[0].operator && filterCandidates[0].query_1"
                                href="#"
                                class="btn btn-primary btn-sm"
                                @click.prevent="applyFilter">
                                <span><i class="fa fa-check"></i> {{trans('filters.apply_filters')}}</span>
                            </a>
                            <a
                                href="#"
                                v-if="appliedFilters.length > 0"
                                class="btn btn-danger btn-sm"
                                @click.prevent="resetFilter">
                                <span><i class="fa fa-arrow-left"></i> {{trans('filters.reset')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-15" v-for="(f, i) in filterCandidates">
                <template v-if="collection.data.length">
                    <div class="col-md-3">
                        <select class="form-control" @change="selectColumn(f, i, $event)">
                            <option value="">{{trans('filters.select_filter')}}</option>
                            <optgroup v-for="group in filterGroups" :label="group.name">
                                <option
                                    v-for="x in group.filters"
                                    :value="JSON.stringify(x)"
                                    :selected="f.column && x.name === f.column.name">
                                    {{x.title}}
                                </option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-4" v-if="f.column">
                        <select class="form-control" @change="selectOperator(f, i, $event)">
                            <option value="">{{trans('filters.select_operator')}}</option>
                            <option
                                v-for="y in fetchOperators(f)"
                                :value="JSON.stringify(y)"
                                :selected="f.operator && y.name == f.operator.name">
                                {{y.title}}
                            </option>
                        </select>
                    </div>
                    <template v-if="f.column && f.operator">
                        <div class="col-md-4" v-if="f.operator.component === 'single'">
                            <select v-if="f.operator.parent.includes('boolean')" class="form-control" v-model="f.query_1">
                                <option value="1" selected>{{trans('filters.true')}}</option>
                                <option value="0">{{trans('filters.false')}}</option>
                            </select>
                            <input v-else class="form-control" v-model="f.query_1">
                        </div>
                        <template v-if="f.operator.component === 'double'">
                            <div class="col-md-2">
                                <input class="form-control" v-model="f.query_1">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" v-model="f.query_2">
                            </div>
                        </template>
                        <template v-if="f.operator.component === 'datetime_1'">
                            <div class="col-md-2">
                                <input class="form-control" v-model="f.query_1">
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" v-model="f.query_2">
                                    <option value="hours">{{trans('filters.hours')}}</option>
                                    <option value="days">{{trans('filters.days')}}</option>
                                    <option value="months">{{trans('filters.months')}}</option>
                                    <option value="years">{{trans('filters.years')}}</option>
                                </select>
                            </div>
                        </template>
                        <template v-if="f.operator.component === 'datetime_2'">
                            <div class="col-md-4">
                                <select class="form-control" v-model="f.query_1">
                                    <option value="yesterday">{{trans('filters.yesterday')}}</option>
                                    <option value="today">{{trans('filters.today')}}</option>
                                    <option value="tomorrow">{{trans('filters.tomorrow')}}</option>
                                    <option value="last_month">{{trans('filters.last_month')}}</option>
                                    <option value="this_month">{{trans('filters.this_month')}}</option>
                                    <option value="next_month">{{trans('filters.next_month')}}</option>
                                    <option value="last_year">{{trans('filters.last_year')}}</option>
                                    <option value="this_year">{{trans('filters.this_year')}}</option>
                                    <option value="next_year">{{trans('filters.next_year')}}</option>
                                </select>
                            </div>
                        </template>
                    </template>
                </template>

                <div class="col-md-1">
                    <button
                        v-if="f && collection.data.length"
                        class="btn btn-danger btn-sm"
                        @click.prevent="removeFilter(f, i)">
                        <i class="fa fa-window-close"></i>
                    </button>
                </div>
            </div>
            <br>
            <template v-if="loading">
                <div class="row text-center">
                    <div class="col-md-12">
                        <loader></loader>
                    </div>
                </div>
            </template>

            <template v-if="!collection.data.length && !loading">
                <div class="alert alert-warning">{{trans('no_data_found')}}</div>
                <br>
            </template>

            <div class="row" v-if="collection.data.length && !loading">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                                    <slot name="thead"></slot>
                                    <tbody>
                                    <slot
                                        v-if="collection.data.length"
                                        v-for="item in collection.data" :item="item"></slot>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-if="!loading && collection.data.length">
                <div class="col-md-4">
                    <label class="ct-label"><strong>{{trans('filters.order_by')}}</strong></label>
                    <select
                        class="form-control"
                        :disabled="loading"
                        @input="updateOrderColumn">
                        <option
                            v-for="column in orderables"
                            :value="column.name"
                            :selected="column && column.name == query.order_column">
                            {{column.title}}
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="ct-label">
                        <strong>
                            {{ trans('filters.show_enteries', {from: collection.meta.from, to: collection.meta.to, total: collection.meta.total}) }}
                        </strong>
                    </label>

                    <select
                        class="form-control"
                        v-model="query.limit"
                        :disabled="loading"
                        @change="updateLimit">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <button
                        class="btn btn-secondary"
                        :disabled="!collection.links.prev || loading"
                        @click="prevPage">&laquo; {{trans('filters.prev')}}</button>
                    <button
                        class="btn btn-secondary"
                        :disabled="!collection.links.next || loading"
                        @click="nextPage">{{trans('filters.next')}} &raquo;</button>
                </div>
                <div class="col-md-1 mt-4">
                    <button
                        @click.prevent="updateOrderDirection"
                        class="btn btn-default">
                        <i class="fa" :class="query.order_direction === 'asc' ? 'fa-arrow-up' : 'fa-arrow-down'"></i>
                    </button>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            url: String,
            filterGroups: Array,
            orderables: Array,
            newButton: {
                type: Boolean,
                default: true,
            },
        },

        data() {
            return {
                loading: true,
                appliedFilters: [],
                filterCandidates: [],
                query: {
                    order_column: null,
                    order_direction: 'desc',
                    filter_match: 'and',
                    limit: 10,
                    page: 1,
                },

                collection: {
                    data: [],
                }
            }
        },

        mounted() {
            this.$eventBus.$on('changed', () => {this.resetFilter()});
            this.fetch();
            this.addFilter();

            this.$eventBus.$on('created', (data) => {
                this.collection.data.unshift(data);
            });
        },

        computed: {
            fetchOperators() {
                return (f) => {
                    return this.availableOperators().filter((operator) => {
                        if(f.column && operator.parent.includes(f.column.type)) {
                            return operator;
                        }
                    });
                }
            },

            createPoint() {
                return location.pathname + '/create';
            }
        },

        methods: {
            getFilters() {
                const f = {};

                this.appliedFilters.forEach((filter, i) => {
                    f[`f[${i}][column]`] = filter.column.name;
                    f[`f[${i}][operator]`] = filter.operator.name;
                    f[`f[${i}][query_1]`] = filter.query_1;
                    f[`f[${i}][query_2]`] = filter.query_2;
                });

                return f;
            },

            fetch() {
                this.loading = true;

                const filters = this.getFilters();

                const params = {
                    ...this.query,
                    ...filters
                };

                axios.get(this.url, {params: params})
                    .then((response) => {
                        this.collection = response.data;
                        this.query.page = response.data.meta.current_page;
                    })
                    .catch(error => {
                        alert(error.response.data.message);
                    })
                    .finally(() => this.loading=false);
            },

            updateOrderColumn(e) {
                const value = e.target.value;

                this.query.order_column = value;

                this.applyChange();
            },

            updateOrderDirection() {
                this.query.order_direction = this.query.order_direction == 'asc' ? 'desc' : 'asc';

                this.applyChange();
            },


            applyChange() {
                this.fetch();
            },

            addFilter() {
                this.filterCandidates.push({
                    column: '',
                    operator: '',
                    query_1: null,
                    query_2: "",
                })
            },

            resetFilter() {
                this.appliedFilters.splice(0);
                this.filterCandidates.splice(0);
                this.addFilter();
                this.query.page = 1;
                this.applyChange();
            },

            applyFilter() {
                this.appliedFilters = JSON.parse(JSON.stringify(this.filterCandidates));

                this.query.page = 1;

                this.applyChange();
            },

            removeFilter(f, i, e) {
                if(this.filterCandidates.length > 1) {
                    this.filterCandidates.splice(i, 1);
                }
            },

            selectColumn(f, i, e) {
                let value = e.target.value;

                if(value.length === 0) {
                    this.filterCandidates[i].column = value;
                    return ;
                }

                let obj = JSON.parse(value);
                this.filterCandidates[i].column = obj;

                switch(obj.type) {
                    case 'numeric':
                        this.filterCandidates[i].operator = this.availableOperators[4];
                        this.filterCandidates[i].query_1  = null;
                        this.filterCandidates[i].query_2  = null;
                        break;
                    case 'string':
                        this.filterCandidates[i].operator = this.availableOperators[6];
                        this.filterCandidates[i].query_1  = null;
                        this.filterCandidates[i].query_2  = null;
                        break;
                    case 'datetime':
                        this.filterCandidates[i].operator = this.availableOperators[9];
                        this.filterCandidates[i].query_1  = 28;
                        this.filterCandidates[i].query_2  = 'days';
                        break;
                    case 'counter':
                        this.filterCandidates[i].operator = this.availableOperators[14];
                        this.filterCandidates[i].query_1  = null;
                        this.filterCandidates[i].query_2  = null;
                        break;
                }
            },

            selectOperator(f, i, e) {
                let value = e.target.value;

                if(value.length === 0) {
                    this.filterCandidates[i].operator = value;
                    return;
                }

                let obj = JSON.parse(value);
                this.filterCandidates[i].operator = obj;
                this.filterCandidates[i].query_1 = null;
                this.filterCandidates[i].query_2 = null;

                switch(obj.name) {
                    case 'in_the_past':
                    case 'in_the_next':
                        this.filterCandidates[i].query_1 = 28;
                        this.filterCandidates[i].query_2 = 'days';
                        break;
                    case 'in_the_period':
                        this.filterCandidates[i].query_1 = 'today';
                        break;
                }

            },

            updateLimit() {
                this.query.page = 1;
                this.applyChange();
            },

            prevPage() {
                if(this.collection.links.prev) {
                    this.query.page = Number(this.query.page) - 1 ;
                    this.applyChange();
                }
            },

            nextPage() {
                if(this.collection.links.next) {
                    this.query.page = Number(this.query.page) + 1 ;
                    this.applyChange();
                }
            },

            availableOperators() {
                return [
                    {title: 'equal to', name: 'equal_to', parent: ['numeric', 'string'], component: 'single'},
                    {title: 'not equal to', name: 'not_equal_to', parent: ['numeric', 'string'], component: 'single'},

                    {title: 'less than', name: 'less_than', parent: ['numeric'], component: 'single'},
                    {title: 'greater_than', name: 'greater_than', parent: ['numeric'], component: 'single'},

                    {title: 'between', name: 'equal_to', parent: ['numeric'], component: 'double'},
                    {title: 'not between', name: 'not_between', parent: ['numeric'], component: 'double'},

                    {title: 'contains', name: 'contains', parent: ['string'], component: 'single'},
                    {title: 'starts with', name: 'starts_with', parent: ['string'], component: 'single'},
                    {title: 'ends with', name: 'ends_with', parent: ['string'], component: 'single'},

                    {title: 'in the past', name: 'in_the_past', parent: ['datetime'], component: 'datetime_1'},
                    {title: 'in the next', name: 'in_the_next', parent: ['datetime'], component: 'datetime_1'},
                    {title: 'in the period', name: 'in_the_period', parent: ['datetime'], component: 'datetime_2'},


                    {title: 'equal to count', name: 'equal_to_count', parent: ['counter'], component: 'single'},
                    {title: 'not equal to count', name: 'not_equal_to_count', parent: ['counter'], component: 'single'},
                    {title: 'less than count', name: 'less_than_count', parent: ['counter'], component: 'single'},
                    {title: 'greater than count', name: 'greater_than_count', parent: ['counter'], component: 'single'},

                    {title: 'equal to', name: 'equal_to', parent: ['boolean'], component: 'single'},
                    {title: 'not equal to', name: 'not_equal_to', parent: ['boolean'], component: 'single'},
                ]
            },

            exportToCsv(filename, rows) {
                var processRow = function (row) {
                    var finalVal = '';
                    for (var j = 0; j < row.length; j++) {
                        var innerValue = row[j] === null ? '' : row[j].toString();
                        if (row[j] instanceof Date) {
                            innerValue = row[j].toLocaleString();
                        };
                        var result = innerValue.replace(/"/g, '""');
                        if (result.search(/("|,|\n)/g) >= 0)
                            result = '"' + result + '"';
                        if (j > 0)
                            finalVal += ',';
                        finalVal += result;
                    }
                    return finalVal + '\n';
                };

                var csvFile = '';
                for (var i = 0; i < rows.length; i++) {
                    csvFile += processRow(rows[i]);
                }

                var blob = new Blob([csvFile], { type: 'text/csv;charset=utf-8;' });
                if (navigator.msSaveBlob) { // IE 10+
                    navigator.msSaveBlob(blob, filename);
                } else {
                    var link = document.createElement("a");
                    if (link.download !== undefined) { // feature detection
                        // Browsers that support HTML5 download attribute
                        var url = URL.createObjectURL(blob);
                        link.setAttribute("href", url);
                        link.setAttribute("download", filename);
                        link.style.visibility = 'hidden';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }
                }
            }

        }

    }
</script>

<style>
    .filterable {
        padding: 20px;
    }
</style>
