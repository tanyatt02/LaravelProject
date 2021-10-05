
@extends('layouts.admin')
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Комментарии</h1>
		{{-- <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fas fa-plus fa-sm text-white-50"></i> Add new</a> --}}
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
                                            <th>Author</th>
                                            <th>Title of New</th>
                                            <th>Description</th>
                                            <th>New</th>
                                            <th>Date</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 10%;">Author</th>
                                            <th style="width: 10%;">Title</th>
                                            <th style="width: 25%;">Description</th>
                                            <th style="width: 15%;">Title of New</th>
                                            <th style="width: 10%;">Date</th>
                                            <th style="width: 10%;">Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($commentsList as $comment)
                                        <tr>
                                            <td>{!! $comment->id !!}</td>
                                            <td>{!! $comment->author !!}</td>
                                            <td>{!! $comment->title !!}</td>
                                            <td>{!! $comment->description !!}</td>
                                            <td>{!! optional($comment->news)->title !!}</td>
                                            <td>{!! $comment->updated_at->format('d M, Y h:i') !!}</td>
                                            <td><a href="{{ route('admin.comments.edit', ['comment' => $comment->id]) }}">Ред.</a>
                                                     &nbsp;
                                                     <a href="javascript:;" class="delete" rel="{{ $comment->id }}">Уд.</a>
                                            </td>
  
                                       </tr>
                                       @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
    {{ $commentsList->links() }}
@endsection

@push('js')
	<script type="text/javascript">
		$(function() {

			$(".delete").on('click', function() {
				var id = $(this).attr("rel");
			    if(confirm("Подтверждаете удаление комментария с #ID " + id)) {
				  $.ajax({
					type: "delete",
					headers: {
					   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "/admin/comments/" + id,
					success: function (response) {
						alert("Комментарий успешно удален");
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
   

       