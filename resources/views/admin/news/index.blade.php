
@extends('layouts.admin')
@section('content')
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Панель администратора
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 10%;">Title</th>
                                            <th style="width: 25%;">Description</th>
                                            <th style="width: 10%;">Date</th>
                                            <th style="width: 10%;">Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($newsList as $news)
                                        <tr>
                                            <td>{!! $news['id'] !!}</td>
                                            <td>{!! $news['title'] !!}</td>
                                            <td>{!! $news['description'] !!}</td>
                                            <td>{!! $news['created_at']->format('d-m-Y') !!}</td>
                                            <td>$320,800</td>
  
                                       </tr>
                                       @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
@endsection

        <!--<h2><a href="<?=route('news.show', ['id' => $news['id']])?>"><?=$news['title']?></a></h2> -->
        