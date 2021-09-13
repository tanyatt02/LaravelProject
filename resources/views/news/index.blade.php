@extends('layouts.main')
@section('content')


    <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                @foreach($newsList as $news)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <a href="{{route('news.show', ['id' => $news['id']])}}">
                                        <img src="https://dummyimage.com/290x200/000/fff" alt=""/></div>
                                    </a>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="single.html" class="fh5co_magna py-2"> <a href="{{route('news.show', ['id' => $news['id']])}}">{{$news['title']}}<br></a>
                            </a> {{  $news['created_at']->format('d M, Y') }} 
                            <div class="fh5co_consectetur"> {!! $news['description'] !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                
    </div>  

    @include('news.categories')





@endsection