@extends('layouts.main')
@section('content')

<div class="container-fluid pb-4 pt-4 paddding"> 
    <div class="container paddding">
        <div class="row mx-0">
<div  style="width:800px;">
    
    <form method='post' action="{{ route('comment.store', ['news' => $news_id]) }}">
        @csrf
        <div class='form-group'>
            <input type='text' class='form-control' name='news_id' id='news_id' value="{{ $news_id }}" hidden>
            <label for='author'>Author:</label>
            @error('author') <div style="color:red;">{{ $message }}</div> @enderror
            <input type='text' class='form-control' name='author' id='author' value="{{ old('author') }}">
            <label for='title'>Title:</label>
            @error('title') <div style="color:red;">{{ $message }}</div> @enderror
            <input type='text' class='form-control' name='title' id='title' value="{{ old('title') }}">
            <label for='comment'>Your comment:</label>
            <textarea  class='form-control' name='description' id='description'>{{ old('description') }}
            </textarea>
            <div style='height:25px;'></div>
            <button type='submit' class='button treding_btn'>Send</button>
        </div>
    </form>
</div>
</div>
</div>
</div>

@endsection