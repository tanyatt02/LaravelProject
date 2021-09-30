@extends('layouts.main')
@section('content')

<div class="container-fluid pb-4 pt-4 paddding"> 
    <div class="container paddding">
        <div class="row mx-0"> 

            <div id="fh5co-title-box"  data-stellar-background-ratio="0.5">
                <img src="https://dummyimage.com/1100x500/777/fff" alt=""/>
            </div>
        <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
            <div class="container paddding">
                <div class="row mx-0">
                    <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">

                        <p>
                            TITLE: {{ $news->title }} 
                    
                        </p>
                        <p>
                            {{ $news->description }}
                    
                        </p>
                        <div class="fh5co_consectetur" style="font-size: 10px;"><strong>Theme: </strong> {!! optional($news->category)->title !!}
                        </div>
                        <br><br>
                        <p style='font-family: sans-serif;'> Комментарии:<br></p>
                        @forelse($commentsList as $comment)
                            <div class="row pb-4">
                                {{-- <div class="col-md-5">
                                    
                                </div> --}}
                                <div class="col-md-7 animate-box">
                                    <a href=''>{{$comment->title}}<br></a>
                                    </a> {{  $comment->created_at->format('d M, Y') }} 
                                    <div class="fh5co_consectetur">{!! $comment->description !!}
                                    </div>
                                    <div class="fh5co_consectetur" style="font-size: 10px;"><strong>Author: </strong> {!! $comment->author !!}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p> Ваш комментарий будет первым </p>
                        @endforelse
                         <a href="{{ route('comment.create', ['news' => $news->id])  }}" class="fh5co_tagg">Ваш комментарий</a>
                    </div>
                   
                    
                
                {{-- <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                
                    <div class="clearfix"></div>  --}}
                        @include('news.categories')
                
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>


@endsection