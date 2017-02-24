<section class="latestNews section-padding">
            <div class="container">
                {{-- <div class="row">
                   
                </div> --}}
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-4">
                        <div class="section_title">
                            <h2 class="sec_Hd" id="news_header">Announcements</h2>
                            @if(count($news->getPost(1)) != 0 )  
                                <em>Find our recent Announcements</em>
                                @foreach( $news->getPost(1) as $key => $posts)
                                <div class="col-sm-12">
                                    @if($key == 6)
                                    @break
                                    @endif
                                    <div class="row all_news area_content">
                                        <div class="col-sm-12">
                                            <div class="single_news row fix_m">
                                                <figure>
                                                    
                                                   <figcaption style="left: -18px;">
                                                        <p class="colorWhite text-center">{{ date('d', strtotime($posts->published_at)) }}<span>{{ date('M', strtotime($posts->published_at)) }}</span>
                                                        <span>{{ date('Y', strtotime($posts->published_at)) }}</span></p>
                                                    </figcaption>
                                                </figure>
                                                <a title="Click to View" target="_blank" href=" @if($posts->is_file == 1) {{asset($posts->path)}} @else{{url()}}/post/{{$posts->slug}} @endif" >
                                                    <div class="news_txt home_news col-xs-12 col-sm-8 posts-box" >
                                                      <i class="fa fa-th-large" id="post-download" aria-hidden="true" ></i>
                                                        <h4>{{ $posts->title }}</h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <em class="post-em" ><strong>There are no Announcements recently.</strong></em>
                            @endif
                        </div>
                   </div>
                    <div class="col-sm-4">
                        <div class="section_title">
                            <h2 class="sec_Hd" id="news_header">Events</h2>
                            @if(count($news->getPost(2)) != 0 )  
                                <em>Find our recent Events</em>
                                @foreach( $news->getPost(2) as $key => $posts)
                                <div class="col-sm-12">
                                    @if($key == 6)
                                    @break
                                    @endif
                                    <div class="row all_news area_content">
                                        <div class="col-sm-12">
                                            <div class="single_news row fix_m">
                                                <figure >
                                                    
                                                   <figcaption style="left: -18px;">
                                                        <p class="colorWhite text-center">{{ date('d', strtotime($posts->published_at)) }}<span>{{ date('M', strtotime($posts->published_at)) }}</span>
                                                        <span>{{ date('Y', strtotime($posts->published_at)) }}</span></p>
                                                    </figcaption>
                                                </figure>
                                                <a title="Click to View" target="_blank" href=" @if($posts->is_file == 1) {{asset($posts->path)}} @else{{url()}}/post/{{$posts->slug}} @endif" >
                                                    <div class="news_txt home_news col-xs-12 col-sm-8 posts-box" >
                                                      <i class="fa fa-th-large " id="post-download" aria-hidden="true" ></i>
                                                        <h4>{{ $posts->title }}</h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <em class="post-em" ><strong>There are no Events recently.</strong></em>
                            @endif
                        </div>
                    </div>
                     <div class="col-sm-4">
                        <div class="section_title">
                            <h2 class="sec_Hd" id="news_header">Latest Publications</h2>
                            @if(count($news->getPost(3)) != 0 )
                                <em>Find our recent publications</em>   
                                @foreach( $news->getPost(3) as $key => $posts)
                                <div class="col-sm-12">
                                    @if($key == 6)
                                    @break
                                    @endif
                                    <div class="row all_news area_content">
                                        <div class="col-sm-12">
                                            <div class="single_news row fix_m">
                                                <figure >
                                                    
                                                   <figcaption style="left: -18px;">
                                                        <p class="colorWhite text-center">{{ date('d', strtotime($posts->published_at)) }}<span>{{ date('M', strtotime($posts->published_at)) }}</span>
                                                        <span>{{ date('Y', strtotime($posts->published_at)) }}</span></p>
                                                    </figcaption>
                                                </figure>
                                                <a title="Click to Download" download href="{{asset($posts->path)}}">
                                                    <div class="news_txt home_news col-xs-12 col-sm-8 posts-box" >
                                                        <i class="fa fa-arrow-circle-o-down" id="post-download" aria-hidden="true" ></i>
                                                        <h4>{{ $posts->title }}</h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <em class="post-em" ><strong>There are no Publication recently.</strong></em>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>