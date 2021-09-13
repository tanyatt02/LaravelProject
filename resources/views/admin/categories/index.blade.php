
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
                                        @foreach($categoriesList as $key => $category)
                                        <tr>
                                            <td>{!! $key !!}</td>
                                            <td>{!! $category !!}</td>
                                            <td>{!! now()->format('d-m-Y') !!}</td>
                                            <td>
                                            <a href="">Ред.</a>
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

        
