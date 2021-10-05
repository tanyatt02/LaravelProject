
@extends('layouts.admin')
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Список новостей</h1>
		<a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fas fa-plus fa-sm text-white-50"></i> Add new</a>
	</div>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Панель администратора
                            </div>
                            @include('inc.message')
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th style="width: 10%;">Theme</th>
                                            <th>Date</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 10%;">Title</th>
                                            <th style="width: 25%;">Description</th>
                                            <th style="width: 10%;">Theme</th>
                                            <th style="width: 10%;">Date</th>
                                            <th style="width: 10%;">Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($newsList as $news)
                                        <tr>
                                            <td>{!! $news->id !!}</td>
                                            <td>{!! $news->title !!}</td>
                                            <td>{!! $news->description !!}</td>
                                            <td>{!! optional($news->category)->title !!}</td>
                                            <td>{!! $news->updated_at->format('d M, Y h:i') !!}</td>
                                            <td><a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a>
                                                     &nbsp;
                                                <a href="javascript:;" class="delete" rel="{{ $news->id }}">Уд.</a>
                                            </td>
  
                                       </tr>
                                       @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
    {{ $newsList->links() }}
@endsection

@push('js')
	<script type="text/javascript">
		$(function() {

			$(".delete").on('click', function() {
				var id = $(this).attr("rel");
			    if(confirm("Подтверждаете удаление записи с #ID " + id)) {
				  $.ajax({
					type: "delete",
					headers: {
					   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "/admin/news/" + id,
					success: function (response) {
						alert("Запись успешно удалена");
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
   