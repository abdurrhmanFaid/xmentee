@extends('layouts.app')

@section('title')
    {{__('groups.edit', ['group' => $group->name])}}
@endsection

@section('content')
<div class="section-body mt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{__('groups.details')}}
                <div class="card-options">
                    <a href="{{route('groups.show', $group->id)}}" class="btn btn-primary mr-2">
                        <i class="fa fa-eye"></i> {{__('default.view')}}
                    </a>
                    <form class="form-inline" method="post" action="{{route('groups.destroy', $group->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fa fa-trash"></i> {{__('groups.delete')}}
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('groups.update', $group->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?: $group->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description') ?: $group->description}}">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary">{{__('default.update')}}</button>
                    </div>
                </form>
            </div>
        </div>

        <group-members-form
            group-id="{{$group->id}}"
            batch-id="{{$group->batch_id}}"
            :students-ids="{{$group->members->pluck('id')}}">
        </group-members-form>
    </div>
</div>
@endsection
