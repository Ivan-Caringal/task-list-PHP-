@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

 

<!-- <div>
    @if (count ($tasks))
       @foreach ($tasks as $task)
              <div>{{ $task->title }}</div>
              <div>{{ $task->description }}</div>
        @endforeach
    @else
       <div>there are no tasks</div>
    @endif      
</div> -->

<!-- adding  link per item -->
<div>
    @forelse ($tasks as $task)
     <div>
       <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
     </div>
   @empty
     <div>There are no tasks!</div>
   @endforelse
</div>
@endsection