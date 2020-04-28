@extends('layouts.app')

@section('title')
    {{__('categories.edit_category', ['category' => $category->name, 'band' => $band->name])}}
@endsection

@section('content')
    <div class="section-body mt-50">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('categories.edit_category', ['category' => $category->name, 'band' => $band->name])}}</h3>

                            <div class="card-options">
                                <form id="deleteForm" method="POST" action="{{route('categories.destroy', $category->slug)}}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" onclick="event.preventDefault();confirmDeletion()" class="btn btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                        {{__('categories.delete_category', ['category' => $category->name])}}
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('categories.update', $category->slug)}}">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-group">
                                    <label>{{__('categories.name')}}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?: $category->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('categories.description')}}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{old('description') ?: $category->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-edit"></i> {{__('categories.update')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDeletion()
        {
            @php
            $msg = __('categories.delete_category_confirmation', ['category' => $category->name]);
            @endphp

            if(confirm("{{$msg}}")) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
@endpush
