
<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    @foreach($categoryList as $category)
                    <a href="{{ route('news.indexCategory', ['category' => $category->title, 'id' => $category->id])  }}" class="fh5co_tagg">{{ $category->title }}</a>
                        
                    @endforeach
                </div>
                
</div>

