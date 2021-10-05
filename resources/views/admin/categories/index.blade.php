
@extends('layouts.admin')
@section('content')
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Панель администратора
                                <span><a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					                class="fas fa-plus fa-sm text-white-50"></i> Add category</a></span>
                            </div>
                            @include('inc.message')
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th style="width: 5%;">Count of News</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 10%;">ID</th>
                                            <th style="width: 55%;">Title</th>
                                            <th style="width: 15%;">Date</th>
                                            <th style="width: 5%;">Count of News</th>
                                            <th style="width: 10%;">Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($categoriesList as $category)
                                        <tr>
                                            <td>{!! $category->id !!}</td>
                                            <td>{!! $category->title !!}</td>
                                            <td>{!! $category->created_at->format('d M, Y') !!}</td>
                                            <td>{!! $category->news_count !!}</td>
                                            <td>    
                                                <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a>
                                                     &nbsp;
                                                     <a href="javascript:;" class="delete" rel="{{ $category->id }}">Уд.</a>
                                            </td>
  
                                       </tr>
                                       @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
@endsection

@push('js')
	<script type="text/javascript">
		$(function() {

			$(".delete").on('click', function() {
				var id = $(this).attr("rel");
			    if(confirm("Подтверждаете удаление категории с #ID " + id)) {
				  $.ajax({
					type: "delete",
					headers: {
					   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "/admin/categories/" + id,
					success: function (response) {
						alert("Категория успешно удалена");
						console.log(response);
						location.reload();
					},
					error: function (error) {
						console.log(error);
					}
				});
			   }
			});
		});
	</script>
@endpush
   

        
