
@extends('layouts.admin')
@section('content')
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Панель администратора
                                <span><a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					                class="fas fa-plus fa-sm text-white-50"></i> Add category</a></span>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 10%;">ID</th>
                                            <th style="width: 55%;">Title</th>
                                            <th style="width: 15%;">Date</th>
                                            <th style="width: 10%;">Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($categoriesList as $category)
                                        <tr>
                                            <td>{!! $category->id !!}</td>
                                            <td>{!! $category->title !!}</td>
                                            <td>{!! $category->created_at !!}</td>
                                            <td>
                                                
                                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a>
                                                     &nbsp;
                                                    <a href="">Уд.</a>
                                            </td>
  
                                       </tr>
                                       @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
@endsection

        
