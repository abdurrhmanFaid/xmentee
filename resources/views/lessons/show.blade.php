@extends('layouts.app')

@section('title')
    {{$lesson->title}}
@endsection

@section('pageTitle') {{$lesson->title}} @endsection
@section('breadcrumbs') {{Breadcrumbs::render('lessons.show', $lesson, $band)}} @endsection

@section('content')
<div class="section-body mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card">
                        @instructor
                        <div class="card-header">
                            <a href="{{route('lessons.edit', $lesson->slug)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <form id="deleteForm" class="d-inline" method="POST" action="{{route('lessons.destroy', $lesson->slug)}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="event.preventDefault();confirmDeletion()" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                        @endinstructor

                        <div class="card-header">
                            <h3 class="card-title">
                                {{__('lessons.details')}}
                            </h3>
                        </div>
                        <table class="table card-table mt-2">
                            <tbody>
                            <tr>
                                <td>
                                    <p class="mb-0 d-flex justify-content-between"><span>{{__('lessons.created_at')}}</span>
                                        <strong>
                                            {{$lesson->created_at->diffForHumans()}}
                                        </strong>
                                    </p>
                                </td>
                            </tr>
                            @can('update', $band)
                                <tr>
                                    <td>
                                        <p class="mb-0 d-flex justify-content-between"><span>{{__('lessons.batch')}}</span>
                                            <strong>
                                                <a href="{{route('batches.show', $lesson->batch->slug)}}">{{$lesson->batch->name}}</a>
                                            </strong>
                                        </p>
                                    </td>
                                </tr>
                            @endcan
                            <tr>
                                <td>
                                    <p class="mb-0 d-flex justify-content-between"><span>{{__('lessons.category')}}</span>
                                        <strong>
                                            <a href="{{route('categories.show', $lesson->category->slug)}}">{{$lesson->category->name}}</a>
                                        </strong>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('lessons.instructors')}}</h3>
                        </div>
                        <table class="table card-table mt-2">
                            <tbody>
                                @foreach($lesson->instructors as $instuctor)
                                    <tr>
                                        <td class="w60"><img class="avatar" src="{{$instuctor->formattedImage}}" alt="Avatar"></td>
                                        <td>
                                            <p class="mb-0 d-flex justify-content-between">
                                                <span>
                                                    <a href="{{route('profiles.show', $instuctor->username)}}">
                                                        {{$instuctor->name}}
                                                    </a>
                                                </span>
                                            </p>
                                            <span class="text-muted font-13">{{$instuctor->formattedUsername}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! $lesson->video() !!}
                        <hr>
                        {!! $lesson->description !!}
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
                $msg = __('lessons.confirm_delete');
            @endphp

            if(confirm("{{$msg}}")) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
@endpush
