 <section class="clinical_services section-padding" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_title">
                            <h2 class="sec_Hd" style="color:#0277bd">Our Units
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row area_content">
                    <div class="col-md-12">
                        <div class="item_clinicalservice">
                            <div class="homeunits_nav" style="position: absolute;  right: -20px;  top: -92px;width: 9.5%;">
                                <i class="fa fa-angle-left testi_prev"></i>
                                <i class="fa fa-angle-right testi_next"></i>
                            </div>
                            <div class="homeunits">
                             @foreach ($department as $post)
                                <div class="item" >
                                <a href='@if($post->url){{asset($post->url)}} @else javascript:void(0) @endif'>
                                    <figure class="dept-figure">
                                        @if(count($images->getImage('Departments',$post->id)) > 0 )
                                            @foreach($image as $images)
                                                @if($images->imageable_type === 'Departments' && $images->imageable_id == $post->id )
                                                    <img alt="" src="{{ asset($images->thumbnail(240,260)) }}">
                                                @endif
                                            @endforeach                                            
                                       @else 
                                            <img alt="" src="{{ asset($images->placeholder(240,260,"department")) }}">
                                            
                                       @endif 
                                        <figcaption class = "dept-figcaption"> 
                                            {{-- <i class="flaticon-science110"></i> --}}
                                            <h4 style="color: black !important;">{{ $post->title }}</h4>
                                        </figcaption> 
                                    </figure>
                                    </a>
                                </div>
                              @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         
                                    