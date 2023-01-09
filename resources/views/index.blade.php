@extends('layout')

@section('main-content')
<div>
    <div class="float-start">
        <h4 class="pb-5">
            My tasks
        </h4>
    </div>
    <div class="float-end">
        <a href="{{ route('task.create') }}" class="btn btn-info">
            Create Task
        </a>
    </div>

    <div class="clearfix"></div>
</div>
@foreach ($tasks as $task)

<div class="card">
    <div class="card-header display-6">
        @if ($task->status === "Todo")
        {{$task->title}}

        @else
        <del>{{$task->title}}</del>

        @endif

        <span class="badge text-bg-warning">
            {{$task->created_at }}
        </span>
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="float-start">
                <strong>
                    {{$task->desc}}

                </strong>
                <br>
                @if ($task->status === "Todo")
                <span class="badge text-bg-info text-dark">Todo</span>

                @else
                <span class="badge text-bg-info text-white">Done</span>

                @endif
                <small>Last updated
                    {{$task->updated_at}}
                </small>
            </div>
            <div class="float-end">
                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-success">
                    EDIT
                </a>
                <form action="{{route('task.destroy', $task->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="display: inline;">
                        delete
                    </button>
                </form>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
</div>
@endforeach

@if (count($tasks) === 0)
<div class="alert alert-danger p-2">
    NO tak found. Please create another task!
    <a href="{{ route('task.create') }}" class="btn btn-info">
        Create Task
    </a>
</div>
@else

@endif
@endsection