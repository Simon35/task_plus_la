@extends('layout')

@section('main-content')
    <h4 class="pb-5">
        Edit an old task - <span class="badge bg-info">{{$task->title}}</span>
    </h4>
    <form action="{{ route('task.update',$task->id) }}" method="post">
        @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}" placeholder="veuillez saisir le titre ici">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <input type="text" class="form-control" id="desc" name="desc" rows="4" value="{{$task->desc}}">
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            @foreach ($statuses as $status)
                <option value="{{$status['value']}}" {{$task->status === $status['value'] ? 'selected' : ''}}>{{$status['label']}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
