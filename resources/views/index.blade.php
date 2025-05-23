@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="flex  mt-10  w-full flex flex-col items-center min-h-screen">
  <h1  class="mb-4 text-2xl text-center font-bold">@yield('title')</h1>
  <div class="border border-gray-300 rounded-lg p-6 shadow-sm">
    
    <!-- adding  link per item -->
    <div>
        @forelse ($tasks as $task)
        <div>
          <a href="{{ route('tasks.show', ['task' => $task->id]) }}"  @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
      @empty
        <div>There are no tasks!</div>
      @endforelse
    </div>

   

    <nav class="mb-4 mt-4">
        <a href="{{ route('tasks.create') }}"
          class="font-medium text-white bg-green-500 hover:bg-green-600 rounded px-4 py-2">Add Task!</a>
    </nav>
     @if ($tasks->count())
      <nav class="mt-4">
        {{ $tasks->links() }}
      </nav>
    @endif
  </div>
  
</div>

@endsection