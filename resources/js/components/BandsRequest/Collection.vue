<template>
    <filterable v-bind="filterable">
        <thead slot="thead">
        <tr>
            <th>Band Name</th>
            <th>From</th>
            <th>Members_count</th>
            <th>Created From</th>
            <th>Approved ?</th>
            <th>Action</th>
        </tr>
        </thead>
        <tr slot-scope="{item}">
            <td>{{item.band_name}}</td>
            <td>{{item.owner_email}}</td>
            <td>{{item.members_count}}</td>
            <td>{{item.created_at}}</td>
            <td>
                <span class="badge" :class="item.approved ? 'badge-success' : 'badge-secondary'">
                    {{item.approved ? 'Approved' : 'Awaiting'}}
                </span>
            </td>
            <td>
                <a
                    :href="'/dashboard/bands-request/' + item.id"
                    class="btn btn-outline-info">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
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
                    url: '/dashboard/bands-request',
                    orderables: [
                        {title: 'Created At', name: 'created_at'},
                        {title: 'Members Count', name: 'members_count'},
                        {title: 'Approved', name: 'approved'},
                    ],

                    filterGroups: [
                        {
                            name: 'Band',
                            filters: [
                                {title: 'Owner Email', name: 'owner_email', type: 'string'},
                                {title: 'Name', name: 'band_name', type: 'string'},
                                {title: 'Members count', name: 'members_count', type: 'numeric'},
                                {title: 'Created At', name: 'created_at', type: 'datetime'},
                                {title: 'Approved', name: 'approved', type: 'boolean'}
                            ]
                        },
                    ],
                },
            }
        },
    }
</script>
