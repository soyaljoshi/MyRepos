 <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 column">
                    <div class="sec-title">
                        <h2>Recent <span>News/Events</span></h2>
                    </div>      

                    <div class="remove-ext">
                        <div class="row">
                        @foreach( $news->getPost(1) as $key => $posts)
                            <div class="col-md-6">
                                <div class="recent-news">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <a class="news-img" href="{{url('/')}}/post/{{$posts->slug}}" title="">

                                            <img src="{{ asset($posts->path) }}" alt="">

                                            </a>
                                        </div>
                                        <div class="col-md-7">
                                            <h4><a href="{{url('/')}}/post/{{$posts->slug}}" title="">{{ $posts->title }}</a></h4>
                                            {{$posts->meta_description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="recent-events">
                        <div class="sec-title">
                            <h2>Latest <span>Publications</span></h2>
                        </div>
                        <div class="row">
                        @foreach( $news->getPost(3) as $key => $posts)
                            <div class="col-md-6">
                                <div class="event">
                                    <div class="event-thumb">
                                    <a href="{{url('/')}}/post/{{$posts->slug}}">
                                        <img src="{{ asset($posts->path) }}" alt="" />
                                    </a>
                                        {{-- <div class="counter">
                                            <ul class="countdown">
                                                <li><span class="days">00</span><p class="days_ref">days</p></li>
                                                <li><span class="hours">00</span><p class="hours_ref">hours</p></li>
                                                <li><span class="minutes">00</span><p class="minutes_ref">minutes</p></li>
                                                <li><span class="seconds">00</span><p class="seconds_ref">seconds</p></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <div class="event-intro">
                                        <h5><a href="{{url('/')}}/post/{{$posts->slug}}" title="">{{$posts->title}}</a></h5>
                                       {{--  <a href="#" title=""><i class="icon-calendar-empty"></i><span>June</span> 14,2013</a>
                                        <a href="#" title=""><i class="icon-map-marker"></i></a> --}}
                                    </div>
                                </div><!-- Event -->
                            </div>
                        @endforeach    
                        </div>
                    </div><!-- Recent Events -->
                </div>


            </div>
        </div>
    </section>

{{--  --}}