@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Добавить новость</h1>
</div>
<div class="card mb-4 form-form">
    @if($errors->any()) 
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form method='post' action="{{ route('admin.news.store') }}">
        @csrf
        <div class='form-group'>
            <label for='title'>Title:</label>
            <input type='text' class='form-control' name='title' id='title' value="{{ old('title') }}">
            <label for='author'>Author:</label>
            <input type='text' class='form-control' name='author' id='author' value="{{ old('author') }}">
            <label for='description'>Description:</label>
            <textarea  class='form-control' name='description' id='description'>{{ old('description') }}
            </textarea>
            <button type='submit' class='btn btn-success'>Save</button>
        </div>
    </form>
</div>

@endsection