 <!-- Clinical Ceo START --> 
        <section class="Clinical_Ceo section-padding  sd_sec_bg" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section_title">
                            <h2 class="sec_Hd"> <span>In Focus</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row area_content">
                    <div class="col-md-12">
                        @if(count($news->getPost(4)) > 0 )  
                            <div class="Activities-carousel-nav" style="position: absolute;  right: -6px;  top: -92px;width: 9.5%;">
                                        <i class="fa fa-angle-left testi_prev"></i>
                                        <i class="fa fa-angle-right testi_next"></i>
                        </div>
                        @else
                            <em><strong>There are no In Focus Activities Recently</strong></em>
                        @endif
                        <div class="Activities-carousel">   
                        @foreach($news->getPost(4) as $activities)
                            <div class="col-md-12">
                                <div class="single_ceo">
                                    <figure>
                                       @if(count($images->getImage('Post', $activities->id)) > 0 )
                                            @foreach($image as $images)
                                                @if($images->imageable_type === 'Post' && $images->imageable_id == $activities->id )
                                                      <a href="/activities/{{$activities->slug}}"> <img src="{{ asset($images->thumbnail(280,244)) }}" class="img-fluid" alt=""></a>
                                                @endif
                                            @endforeach                                             
                                       @else 
                                            <img src="{{ asset($images->placeholder(280,244,"post")) }}" alt="img-fluid">
                                            
                                       @endif 
                                    </figure>
                                    <div class="ceo_text act-text-box" >
                                        <div class="activity-text">
                                        <h4><strong style="color: #000000;">{{$activities->title}}</strong></h4>
                                        {{-- <h5>Outpatient Surgery</h5> --}}
                                        <p>{!! html_entity_decode($activities->content_html) !!}</p>
                                        </div>
                                        <a id="act-btn" class="btn btn-default btn-color-border-solid" href="/activities/{{$activities->slug}}">Read More</a>
                                    </div>
                                </div> 
                            </div>
                        @endforeach
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- Clinical Ceo END -->
        