@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Редактировать новость</h1>
</div>
<div class="card mb-4 form-form">
    @include('inc.message')
    
    <form method='post' action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class='form-group'>
            <label for='title'>Title:</label>
            <input type='text' class='form-control' name='title' id='title' value="{{ $news->title }}">
            <label for="category_id">Категория</label>
                    <select class="form-control" name="category_id">
                        @foreach($categoriesList as $category)
                            <option value="{{ $category->id }}"
                            @if($news->category_id === $category->id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
            <label for='author'>Author:</label>
            <input type='text' class='form-control' name='author' id='author' value="{{ $news->author }}">
            <label for='description'>Description:</label>
            <textarea  class='form-control' name='description' id='description'>{{ $news->description }}
            </textarea>
            <button type='submit' class='btn btn-success'>Save</button>
        </div>
    </form>
</div>

@endsection