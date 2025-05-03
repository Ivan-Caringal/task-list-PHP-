@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

@section('content')
<div class="container mx-auto mt-10 mb-10 max-w-lg flex-col items-center justify-center">
  <h1 class="mb-4 text-2xl text-center font-bold">@yield('title')</h1>

  <!-- Grid Container for Form -->
  <div class="border border-gray-300 rounded-lg p-6 shadow-sm w-full grid gap-6">
    <form method="POST"
      action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
      @csrf
      @isset($task)
        @method('PUT')
      @endisset

      <!-- Title Input -->
      <div class="grid grid-cols-1">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="w-full p-2 border rounded"
          @class(['border-red-500' => $errors->has('title')])
          value="{{ $task->title ?? old('title') }}" />
        @error('title')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <!-- Description Textarea -->
      <div class="grid grid-cols-1">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5" class="w-full p-2 border rounded"
          @class(['border-red-500' => $errors->has('description')])>
          {{ $task->description ?? old('description') }}
        </textarea>
        @error('description')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <!-- Long Description Textarea -->
      <div class="grid grid-cols-1">
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10" class="w-full p-2 border rounded"
          @class(['border-red-500' => $errors->has('long_description')])>
          {{ $task->long_description ?? old('long_description') }}
        </textarea>
        @error('long_description')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <!-- Submit and Cancel Buttons -->
      <div class="flex items-center mt-3 gap-2">
        <button type="submit" class="btn p-2 bg-blue-500 text-white rounded">
          @isset($task)
            Update Task
          @else
            Add Task
          @endisset
        </button>
        <a href="{{ route('tasks.index') }}" class="btn p-2 bg-gray-500 text-white rounded">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
