    <section class="block whitish">
        <div class="container">
            <div class="fixed whitish" style="background:url({{asset('assets/frontend/images/parallax1.jpg')}});"></div>
            <div class="sec-title">
                <h2><strong>Our</strong> Partners</h2>
            </div>  
            <div class="mission-carousel">
                <ul class="slides">
                    <li>                
                        <div class="row">
                        @foreach($packages as $key => $package)
                     $key++;
                            <div class="col-md-3">
                                <div class="service">
                                @if(count($images->getImage('Package',$package->id)) > 0 )
                                    @foreach($image as $images)
                                        @if($images->imageable_type === 'Package' && $images->imageable_id == $package->id )
                                            <img class="home_popular" src="{{ asset($images->thumbnail(141,139)) }}" alt="">
                                        @endif
                                    @endforeach                                            
                                @else 
                                      <img src="{{ asset('assets/frontend/images/blank-image.jpg') }}" alt="" />
                                @endif
                                    
                                    <h4><span>{{$package->title}}</span></h4>
                                </div>
                            </div>
                            @if ($key%4 ==0)
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
    </section>