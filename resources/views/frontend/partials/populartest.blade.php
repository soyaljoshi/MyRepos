 <section class="clinical_services section-padding  sd_sec_bg" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_title">
                            <h2 class="sec_Hd" style="color:#0277bd">Our Technologies
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row area_content">
                    <div class="col-md-12">
                        <div class="itemhometechnologies" style="position: relative;" >
                            <div class="hometechnologies_nav" style="position: absolute;  right: -20px;  top: -92px;width: 9.5%;">
                                <i class="fa fa-angle-left testi_prev"></i>
                                <i class="fa fa-angle-right testi_next"></i>
                            </div>
                            <div class="hometechnologies clinicalServices_inner">
                            @foreach ($test as $post)
                                    <div class="item">
                                        <!--Card-->
                                        <div class="card card-cascade ">
                                          <a href="@if($post->url){{asset($post->url)}} @else javascript:void(0) @endif">
                                            <div class="tech">
                                              <figure style="border: 0px;">
                                                   <!--Card image-->
                                                  <div class="view overlay hm-white-slight tech">
                                                         
                                                     @if(count($images->getImage('Populartest',$post->id)) > 0 )
                                                          
                                                          @foreach($image as $images)
                                                              @if($images->imageable_type === 'Populartest' && $images->imageable_id == $post->id )
                                                                    <img class="home_popular" src="{{ asset($images->thumbnail(262,262)) }}" class="img-fluid" alt="">
                                                              @endif
                                                          @endforeach                                            
                                                     @else 
                                                         <img class="home_popular" src="{{ asset($images->placeholder(262,262,'technology')) }}" class="img-fluid" alt="">
                                                          
                                                     @endif 
                                                      
                                                  </div>
                                              <!--/.Card image-->
                                              <!--Card content-->
                                              <figcaption class="tech-box" >
                                                   <h4 style="color: black !important;">{{ $post->title }}</h4>
                                              </figcaption>
                                              <!--/.Card content-->
                                              </figure>
                                            </div>
                                          </a>
                                        </div>
                                    <!--/.Card-->
                                    </div>
                            @endforeach
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
 </section>