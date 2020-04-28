<template>
    <filterable v-bind="filterable">
        <thead slot="thead">
        <tr>
            <th>{{trans('lessons.title')}}</th>
            <th>{{trans('lessons.category')}}</th>
            <th>{{trans('created_at')}}</th>
        </tr>
        </thead>
        <tr slot-scope="{item}">
            <td>
                <a :href="`/lessons/${item.slug}`">{{item.title}}</a>
            </td>
            <td>
                <span class="tag tag-danger">
                    {{item.category}}
                </span>
            </td>
            <td>{{item.created_at}}</td>
        </tr>
    </filterable>
</template>

<script>
    import Filterable from '../DataViewer/Filterable'

    export default {
        components: {
            Filterable,
        },

        data() {
            return {
                filterable: {
                    url: '/api/lessons',
                    orderables: [
                        {title: this.trans('created_at'), name: 'created_at'},
                    ],

                    filterGroups: [
                        {
                            name: this.trans('lessons.lesson'),
                            filters: [
                                {title: this.trans('lessons.title'), name: 'title', type: 'string'},
                                {title: this.trans('lessons.description'), name: 'description', type: 'string'},
                                {title: this.trans('created_at'), name: 'created_at', type: 'datetime'},
                            ],
                        },
                        {
                            name: this.trans('lessons.category'),
                            filters: [
                                {title: this.trans('categories.name'), name: 'category.name', type: 'string'},
                            ]
                        },
                    ],
                },
            }
        },
    }
</script>
