@extends('layouts.app')

@section('title')
    {{__('groups.name', ['band' => $band->name])}}
@endsection

@section('content')
    <groups-page inline-template>
        <div class="container mt-5">
            <h3 class="text-muted">{{__('groups.name', ['band' => $band->name])}}</h3>
            @can('update', $band)
                <create-group-form v-if="batches.length" :batches="batches"></create-group-form>
                <batches-collection @fetched="batchesFetched" @selected="batchSelected"></batches-collection>
            @endif
            <list-groups :batch-id="batchId"></list-groups>
        </div>
    </groups-page>
@endsection
