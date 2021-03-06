@extends('layouts.admin')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Добавить категорию</h1>
</div>
<div class="card mb-4 form-form">
    @include('inc.message')
    <form method='post' action="{{ route('admin.categories.store') }}">
        @csrf
        <div class='form-group'>
            <label for='title'>Title:</label>
            <input type='text' class='form-control' name='title' id='title' value="{{ old('title') }}">
            <label for='description'>Description:</label>
            <textarea  class='form-control' name='description' id='description'>{{ old('description') }}
            </textarea>
            <button type='submit' class='btn btn-success' id='Save'>Save</button>
        </div>
    </form>
</div>
<script>
    function ucFirst(str){
        
        if (!str) return str;

        return str[0].toUpperCase() + str.slice(1);

        }
    let title = document.getElementById('title');
    title.addEventListener('keyup', () => {
    document.getElementById('description').value = 'Всякая фигня по теме '+ ucFirst(title.value);
     })              
</script>
@endsection