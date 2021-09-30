@extends('layouts.main')
@section('content')

<div class="container-fluid pb-4 pt-4 paddding"> 
    <div class="container paddding">
        <div class="row mx-0"> 
   
        <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                @foreach($newsList as $news)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <a href="{{route('news.show', ['news' => $news])}}">
                                        <img src="https://dummyimage.com/290x200/000/fff" alt=""/></div>
                                    </a>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="single.html" class="fh5co_magna py-2"> <a href="{{ route('news.show', ['news' => $news]) }}">{{$news->title}}<br></a>
                            </a> {{  $news->created_at->format('d M, Y') }} 
                            <div class="fh5co_consectetur"> {!! $news->description !!}
                            </div>
                            <div class="fh5co_consectetur" style="font-size: 10px;"><strong>Theme: </strong> {!! optional($news->category)->title !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                
    </div>
    @include('news.categories')

</div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                @if ($paginator->onFirstPage())
                    <span class="btn_mange_pagging1"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                @endif
                {{-- <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a> --}}
                @if ($paginator->currentPage() < $lastPage )
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
                @else
                    <span  class="btn_mange_pagging1">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </span>
                @endif
             </div>
        </div>
    </div>
</div>

    




@endsection