@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="container mx-auto mt-20  max-w-lg flex flex-col items-center justify-center">
  <h1 class="mb-4 text-2xl text-center font-bold">@yield('title')</h1>
  <div class="border border-gray-300 rounded-lg p-6 shadow-sm">
    <div class=" mx-auto mt-5">
      <p class="mb-4 text-slate-700">{{ $task->description }}</p>
      
        @if ($task->long_description)
          <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
        @endif
      
      <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
          {{ $task->updated_at->diffForHumans() }}</p>

      <p>
          @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
          @else
            <span class="font-medium text-red-500">Not Completed</span>
          @endif
      </p>
    </div>

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
    </div>
    <div class="container mx-auto mt-5"> 
      <div class="flex gap-2 justify-center"> 
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"class="btn">Edit</a>

        
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
          @csrf
          @method('PUT')
          <button type="submit" class="btn">
              Mark as {{ $task->completed ? 'not completed' : 'completed' }}
          </button>
        </form>


          <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"class="btndel">Delete</button>
          </form>
      </div>
    </div>

  </div>
</div>

@endsection