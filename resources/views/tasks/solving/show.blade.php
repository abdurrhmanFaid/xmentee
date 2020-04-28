@extends('layouts.app')

@section('title')
    {{__('tasks.solve', ['task' => $task->title])}}
@endsection

@section('content')

    <div class="section-body">
        <div class="container mt-4">
            <div class="row">
                <h3>Task</h3>
                <hr>
                <div class="card">
                    <div class="card-body">
                        @if(! $task->open())
                            <div>
                                <i class="fa fa-close"></i>
                            </div>
                        @endif
                        <h4>{{$task->title}}</h4>
                        <p>{{$task->body}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-red">
                            <span class="text-muted">
                                {{$task->created_at->diffForHumans()}}
                            </span>
                            Published {{$task->start_date->diffForHumans()}} <br>
                            Deadline {{$task->end_date ? $task->end_date->diffForHumans() : 'Open'}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('tasks.solution')}}</h3>
                        </div>
                        <div class="card-body">
                            @if(! $taskable = auth()->user()->hasSolved($task))
                                <form method="POST" action="{{route('tasks.solve', $task->id)}}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control @error('solution') is-invalid @enderror" name="solution" rows="8">{{old('solution')}}</textarea>
                                        @error('solution')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Send you solution
                                        </button>
                                    </div>
                                </form>
                            @else
                                {{$taskable->solution}}
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="text-muted">
                                @if(($taskable = $task->x(auth()->user())) instanceof \App\Models\User)
                                    This task will be solved by you
                                @else
                                    This task will be solved by the group [{{$taskable->name}}]
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
