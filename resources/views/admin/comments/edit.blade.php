@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Редактировать новость</h1>
</div>
<div class="card mb-4 form-form">
    @include('inc.message')
    
    <form method='post' action="{{ route('admin.comments.update', ['comment' => $comment]) }}">
        @csrf
        @method('put')
        <div class='form-group'>
            <p>{!! optional($comment->news)->title !!} </p>
            <label for='title'>Title:</label>
            <input type='text' class='form-control' name='title' id='title' value="{{ $comment->title }}">
           
            <label for='author'>Author:</label>
            <input type='text' class='form-control' name='author' id='author' value="{{ $comment->author }}">
            <label for='description'>Description:</label>
            <textarea  class='form-control' name='description' id='description'>{{ $comment->description }}
            </textarea>
            <button type='submit' class='btn btn-success'>Save</button>
        </div>
    </form>
</div>

@endsection