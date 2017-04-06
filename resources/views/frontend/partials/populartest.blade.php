<section class="block">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-title">
            <h2><strong>Recent</strong> Research</h2>
        </div>      
        <div class="mission-carousel">
          <ul class="slides">
            <li>
              <div class="row">
                @foreach ($news->getPost(4) as $key => $post)
                  <div class="col-md-4">
                    <div class="single-mission">
                      <div class="mission-img">
                        <a href="#" title="">
                          @if(count($images->getImage('Post',$post->id)) > 0 )
                            @foreach($image as $images)
                              @if($images->imageable_type === 'Post' && $images->imageable_id == $post->id )
                                <img class="home_popular" src="{{ asset($images->thumbnail(370,196)) }}" alt="">
                              @endif
                            @endforeach                                            
                          @else 
                          <img src="{{ asset('assets/frontend/images/blank-image.jpg') }}" alt="" />
                          @endif 
                        </a>
                      </div>
                      <h3><a href="#" title="">{{ $post->title }}</a></h3>
                      <p>{!! $post->content_html !!}</p>
                    </div>
                  </div>
                  @if ($key+1%3 == 0)
                  </div>
                  </li>
                  <li>
                  <div class="row">
                  @endif 
                @endforeach
              </div>
            </li>    
          </ul>
        </div>      
      </div>
    </div>
  </div>
</section>