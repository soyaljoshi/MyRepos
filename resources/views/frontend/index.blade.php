@extends('frontend.layouts.master')

@section('body')
@include('frontend.partials.slider')

    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title">
                        <h2><strong>About</strong> Us</h2>
                    </div>  
                    <div class="sec-content">   
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim rem provident, saepe nulla nobis reiciendis earum ut quo, placeat aliquam possimus assumenda harum ratione modi ullam eos atque animi veniam?</p>
                    </div>
        
                </div>
            </div>
        </div>
    </section>
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
                                    <div class="col-md-4">
                                        <div class="single-mission">
                                            <div class="mission-img">
                                                <a href="#" title=""><img src="{{ asset('assets/frontend/images/mission1.jpg') }}" alt="" /></a>
                                            </div>
                                            <h3><a href="#" title="">Countries with the most billionair</a></h3>
                                            <p>Lorem ipsum dolor sit amet, condsec dipii ing elit. Pellentesque mi tellus, fring onnte dum vitae, tempor id lorem.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-mission">
                                            <div class="mission-img">
                                                <a href="#" title=""><img src="{{ asset('assets/frontend/images/mission2.jpg') }}" alt="" /></a>
                                            </div>
                                            <h3><a href="#" title="">Countries with the most billionair</a></h3>
                                            <p>Lorem ipsum dolor sit amet, condsec dipii ing elit. Pellentesque mi tellus, fring onnte dum vitae, tempor id lorem.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-mission">
                                            <div class="mission-img">
                                                <a href="#" title=""><img src="{{ asset('assets/frontend/images/mission3.jpg') }}" alt="" /></a>
                                            </div>
                                            <h3><a href="#" title="">Countries with the most billionair</a></h3>
                                            <p>Lorem ipsum dolor sit amet, condsec dipii ing elit. Pellentesque mi tellus, fring onnte dum vitae, tempor id lorem.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="single-mission">
                                            <div class="mission-img">
                                                <a href="#" title=""><img src="{{ asset('assets/frontend/images/mission4.jpg') }}" alt="" /></a>
                                            </div>
                                            <h3><a href="#" title="">Countries with the most billionair</a></h3>
                                            <p>Lorem ipsum dolor sit amet, condsec dipii ing elit. Pellentesque mi tellus, fring onnte dum vitae, tempor id lorem.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-mission">
                                            <div class="mission-img">
                                                <a href="#" title=""><img src="{{ asset('assets/frontend/images/mission5.jpg') }}" alt="" /></a>
                                            </div>
                                            <h3><a href="#" title="">Countries with the most billionair</a></h3>
                                            <p>Lorem ipsum dolor sit amet, condsec dipii ing elit. Pellentesque mi tellus, fring onnte dum vitae, tempor id lorem.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-mission">
                                            <div class="mission-img">
                                                <a href="#" title=""><img src="{{ asset('assets/frontend/images/mission6.jpg') }}" alt="" /></a>
                                            </div>
                                            <h3><a href="#" title="">Countries with the most billionair</a></h3>
                                            <p>Lorem ipsum dolor sit amet, condsec dipii ing elit. Pellentesque mi tellus, fring onnte dum vitae, tempor id lorem.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>      
                </div>
            </div>
        </div>
    </section>


    <section class="block whitish">
        <div class="container">
            <div class="fixed whitish" style="background:url({{asset('assets/frontend/images/parallax2.jpg')}});"></div>
            <div class="sec-title">
                <h2><strong>Our</strong> Partners</h2>
            </div>  
            <div class="mission-carousel">
                <ul class="slides">
                    <li>                
                        <div class="row">
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service1.png') }}" alt="" />
                                    <h4><span>OUR SERVICE</span></h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service2.png') }}" alt="" />
                                    <h4><span>120 countries</span></h4>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service3.png') }}" alt="" />
                                    <h4><span>of all $</span></h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service4.png') }}" alt="" />
                                    <h4><span>CHILDREN</span></h4>
                                </div>
                            </div>
                        </div>  
                    </li>
                    <li>                
                        <div class="row">
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service4.png') }}" alt="" />
                                    <h4><span>OUR SERVICE</span></h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service4.png') }}" alt="" />
                                    <h4><span>120 countries</span></h4>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service4.png') }}" alt="" />
                                    <h4><span>of all $</span></h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service">
                                    <img src="{{ asset('assets/frontend/images/service4.png') }}" alt="" />
                                    <h4><span>CHILDREN</span></h4>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>          
        </div>
    </section>

    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 column">
                    <div class="sec-title">
                        <h2>Recent <span>News/Events</span></h2>
                    </div>      

                    <div class="remove-ext">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="recent-news">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <a class="news-img" href="#" title=""><img src="{{ asset('assets/frontend/images/news1.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="col-md-7">
                                            <h4><a href="#" title="">Countries with the most billionair</a></h4>
                                            <p>Lorem ips sitamet, dipiing elit. Lorem ipsum most.  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="recent-news">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <a class="news-img" href="#" title=""><img src="{{ asset('assets/frontend/images/images/news2.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="col-md-7">
                                            <h4><a href="#" title="">Countries with the most billionair</a></h4>
                                            <p>Lorem ips sitamet, dipiing elit. Lorem ipsum most.  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="recent-news">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <a class="news-img" href="#" title=""><img src="{{ asset('assets/frontend/images/news3.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="col-md-7">
                                            <h4><a href="#" title="">Countries with the most billionair</a></h4>
                                            <p>Lorem ips sitamet, dipiing elit. Lorem ipsum most.  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="recent-news">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <a class="news-img" href="#" title=""><img src="{{ asset('assets/frontend/images/news4.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="col-md-7">
                                            <h4><a href="#" title="">Countries with the most billionair</a></h4>
                                            <p>Lorem ips sitamet, dipiing elit. Lorem ipsum most.  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="recent-events">
                        <div class="sec-title">
                            <h2>Latest <span>Publications</span></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="event">
                                    <div class="event-thumb">
                                        <img src="{{ asset('assets/frontend/images/event1.jpg') }}" alt="" />
                                        <div class="counter">
                                            <ul class="countdown">
                                                <li><span class="days">00</span><p class="days_ref">days</p></li>
                                                <li><span class="hours">00</span><p class="hours_ref">hours</p></li>
                                                <li><span class="minutes">00</span><p class="minutes_ref">minutes</p></li>
                                                <li><span class="seconds">00</span><p class="seconds_ref">seconds</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="event-intro">
                                        <h5><a href="single-post-image.html" title="">Countries with the most billionair</a></h5>
                                        <a href="#" title=""><i class="icon-calendar-empty"></i><span>June</span> 14,2013</a>
                                        <a href="#" title=""><i class="icon-map-marker"></i>In South Africa</a>
                                    </div>
                                </div><!-- Event -->
                            </div>
                            <div class="col-md-6">
                                <div class="event">
                                    <div class="event-thumb">
                                        <img src="{{ asset('assets/frontend/images/event2.jpg') }}" alt="" />
                                        <div class="counter">
                                            <ul class="countdown time2">
                                                <li><span class="days">00</span><p class="days_ref">days</p></li>
                                                <li><span class="hours">00</span><p class="hours_ref">hours</p></li>
                                                <li><span class="minutes">00</span><p class="minutes_ref">minutes</p></li>
                                                <li><span class="seconds">00</span><p class="seconds_ref">seconds</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="event-intro">
                                        <h5><a href="single-post-image.html" title="">Countries with the most billionair</a></h5>
                                        <a href="#" title=""><i class="icon-calendar-empty"></i><span>June</span> 14,2013</a>
                                        <a href="#" title=""><i class="icon-map-marker"></i>In South Africa</a>
                                    </div>
                                </div><!-- Event -->
                            </div>
                        </div>
                    </div><!-- Recent Events -->
                </div>


            </div>
        </div>
    </section>


@stop


     
