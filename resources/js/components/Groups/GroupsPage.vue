<script>
    import ListGroups from './ListGroups';
    import BatchesCollection  from "./Batches/BatchesCollection";
    import CreateGroupForm from './_CreateGroupFormModal';

    export default {
        components: {
            ListGroups: ListGroups,
            BatchesCollection: BatchesCollection,
            CreateGroupForm: CreateGroupForm,
        },

        data() {
            return {
                batchId: null,
                batches: [],
            }
        },

        methods: {
            batchSelected(batchId) {
                if(this.batchId  == batchId) {
                    this.batchId = null
                } else {
                    this.batchId = batchId;
                }
            },

            batchesFetched(batches) {
                this.batches = batches;
            },
        }
    }
</script>
