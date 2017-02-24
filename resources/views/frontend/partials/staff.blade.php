 <section class="tab-area clinical_services section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section_title">
                            <h2 class="sec_Hd" style="color:#0277bd">Team Of Professionals</h2>
                        </div>
                    </div>
                </div>
                <!-- Nav tabs -->
                <div class="row area_content">
                    @if(count($staff)>0)
                    <div class="col-md-12">
                        <div class="staff_carousel">
                            @foreach($staff as $stafflist)
                                    <div class="item">
                                        <figure>
                                            @if(count($images->getImage('Staffmanagement',$stafflist->id)) > 0 )
                                                 @foreach($image as $images)
                                                     @if($images->imageable_type === 'Staffmanagement' && $images->imageable_id == $stafflist->id ) 
                                                        <img src="{{ asset($images->thumbnail(263,343)) }}"  style="opacity: 1!important;">
                                                    @endif
                                                @endforeach
                                            @else
                                                <img src="{{ asset($images->placeholder(263,343,"staff")) }}"  style="opacity: 1!important;">
                                            @endif 
                                            <figcaption>
                                                <h4>{{ $stafflist->name }}</h4>
                                                <h5>{{ $stafflist->designation }}</h5>
                                                {!! html_entity_decode($stafflist->desc) !!}
                                            </figcaption>
                                        </figure>
                                    </div>
                            @endforeach
                        </div>
                        <div class="staff_carousel_nav tab_area_nav">
                            <i class="fa fa-angle-left testi_prev"></i>
                            <i class="fa fa-angle-right testi_next"></i>
                        </div> 
                    </div>
                    @else
                    <div class="col-md-12">
                        <em><strong>No data available</strong></em>
                    </div>
                    @endif
                </div> 
            </div>
</section>

