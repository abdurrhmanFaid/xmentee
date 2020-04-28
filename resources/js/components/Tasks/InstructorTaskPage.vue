<script>
    export default {
        props: ['batches'],

        data() {
            return {
                selectedItems: [],
                loading: false,
                selectedBatch: null,
                groups: [],
                students: [],
            }
        },

        watch: {
            selectedBatch (value) {
                if(value) {
                    if (this.selectedBatch.id == value) this.selectedBatch = null;
                    this.selectedBatch = value;

                    this.loading = true;

                    this.fetchBatchGroups();
                    this.fetchBatchStudents();
                }
            }
        },

        methods: {
            fetchBatchGroups() {
                axios.get(`/api/batches/${this.selectedBatch.slug}/groups`)
                    .then(({data}) => {
                        this.groups = data;
                    })
            },

            fetchBatchStudents() {
                axios.get(`/api/batches/${this.selectedBatch.slug}/students`)
                    .then(({data}) => {
                        this.students = data;
                        this.loading = false;
                    })
            },

            select(item, type) {
                if(this.hasSelected(item)) {
                    this.removeFromSelected(item);
                } else {
                    this.pushToSelected(item, type)
                }
            },

            removeFromSelected(item) {
                this.selectedItems.splice(this.selectedItems.indexOf(item), 1);
            },

            pushToSelected(item, type) {
                this.selectedItems.push({
                    name: type.toUpperCase() + ': ' + item.name,
                    taskable_id: item.id,
                    taskable_type: type,
                });
            },

            hasSelected(item, type) {
                return this.selectedItems.find(selectedItem => selectedItem.taskable_id == item.id && selectedItem.taskable_type == type);
            },

            selectAll(items, type) {
              items.forEach( (item) => {
                  if(! this.hasSelected(item, type)) {
                      this.pushToSelected(item, type);
                  }
              });
            },

            removeAll(items) {
              items.forEach((item) => {
                  this.selectedItems.splice(this.selectedItems.indexOf(
                      this.selectedItems.find(selectedItem => selectedItem.taskable_id == item.id)
                  ), 1)
              });
            },

            assign() {
               if(confirm(this.trans('tasks.sure_to_assign'))) {
                   axios.post(location.pathname, {data: this.selectedItems})
                       .then(response => {

                       });
               }
            }
        }
    }
</script>

<style>
    .selected-batch {
        background: #0080ff;
        color: #fff
    }

    .selected-item {
        background: #ddd;
    }
</style>
