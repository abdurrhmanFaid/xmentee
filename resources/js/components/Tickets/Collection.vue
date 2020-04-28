<template>
    <filterable v-bind="filterable">
        <div slot="actions">
            <button class="btn btn-secondary btn-sm" @click.prevent="updateAll('approved')">
                <i class="fa fa-check"></i> {{trans('tickets.approve_all')}}
            </button>
            <button class="btn btn-danger btn-sm" @click.prevent="updateAll('rejected')">
                <i class="fa fa-window-close"></i> {{trans('tickets.reject_all')}}
            </button>
            <button class="btn btn-primary btn-sm" @click.prevent="updateAll('reviewing')">
                <i class="fa fa-eye"></i> {{trans('tickets.reviewing_all')}}
            </button>
        </div>
        <thead slot="thead">
            <tr>
                <th>{{trans('tickets.owner_name')}}</th>
                <th>{{trans('tickets.code')}}</th>
                <th>{{trans('tickets.status')}}</th>
                <th>{{trans('created_at')}}</th>
                <th>{{trans('action')}}</th>
            </tr>
        </thead>
        <tr slot-scope="{item}">
            <td>{{item.owner_name}}</td>
            <td>{{item.code}}</td>
            <td>
                <span v-if="item.status == 'approved'" class="badge badge-success">
                    <i class="fa fa-check"></i> {{trans('tickets.approved')}}
                </span>
                <span v-if="item.status == 'rejected'" class="badge badge-danger">
                    <i class="fa fa-close"></i> {{trans('tickets.rejected')}}
                </span>
                <span v-if="item.status == 'reviewing'" class="badge badge-primary">
                    <i class="fa fa-refresh"></i> {{trans('tickets.reviewing')}}
                </span>
            </td>
            <td>{{item.created_at}}</td>
            <td>
                    <select @change="update($event, item.id)">
                        <option selected>
                            {{trans('tickets.change_status')}}
                        </option>
                        <option value="reviewing">
                            {{trans('tickets.reviewing')}}
                        </option>
                        <option value="rejected">
                            {{trans('tickets.rejected')}}
                        </option>
                        <option value="approved">
                            {{trans('tickets.approved')}}
                        </option>
                    </select>
                <span
                    @click="remove(item.id)"
                    class="btn btn-outline-danger btn-xs">
                    <i class="fa fa-window-close"></i>
                </span>
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
                loading: false,
                filterable: {
                    url: location.pathname,
                    orderables: [
                        {title: this.trans('created_at'), name: 'created_at'},
                        {title: this.trans('tickets.code'), name: 'code'},
                        {title: this.trans('tickets.statue'), name: 'status'},
                    ],

                    filterGroups: [
                        {
                            name: this.trans('tickets.ticket'),
                            filters: [
                                {title: this.trans('tickets.owner_name'), name: 'owner_name', type: 'string'},
                                {title: this.trans('tickets.code'), name: 'code', type: 'string'},
                                {title: this.trans('tickets.statue'), name: 'status', type: 'string'},
                                {title: this.trans('created_at'), name: 'created_at', type: 'datetime'},
                            ]
                        },
                    ],
                },
            }
        },

        methods: {
            updateAll(status) {
                if(confirm(this.trans("tickets.mark_all_as_" + status + "_confirmation"))) {
                    this.updateStatus({
                        status: status,
                        tickets: ["*"],
                    });
                }
            },

            update(event, ids) {
                let status = event.target.value;

                if(confirm(this.trans("tickets.mark_ticket_as_" +  status + "_confirmation"))) {
                    this.updateStatus({
                        status: status,
                        tickets: [ids],
                    });
                }
            },

            updateStatus(data) {
                axios.patch(`${location.pathname}`, data)
                    .then(response => {
                        this.$eventBus.$emit('changed');
                    });
            },

            remove(ticketId) {
               if(confirm(this.trans('tickets.delete_confirmation'))) {
                   axios.delete(`${location.pathname}/${ticketId}`)
                       .then(response => {
                           this.$eventBus.$emit('changed');
                       });
               }
            }
        }
    }
</script>
