<!-- Health Pacakges START --> 
        <section class="Clinical_Ceo section-padding  sd_sec_bg" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section_title">
                            <h2 class="sec_Hd"> <span>Health Packages</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row area_content">
                    <div class="col-md-12">
                        <div class="package" style="position: relative;" >
                            @if(count($packages) > 0)
                                <div class="package_nav" style="position: absolute;  right: -20px;  top: -92px;width: 9.5%;">
                                    <i class="fa fa-angle-left testi_prev"></i>
                                    <i class="fa fa-angle-right testi_next"></i>
                                </div>
                            @else
                                <em><strong>There are no Packages Recently</strong></em>
                            @endif
                            <div class="packages_carousel">
                                @foreach($packages as $package)
                                <div class="item">
                                    <div class="single_as">
                                        <div class="as_icon">
                                            <i class="{{$package->icon}} icon_packages"></i>
                                        </div>
                                        <div class="service_text">
                                            <h4><a href="#">{{$package->title}}</a></h4>
                                            <p>{!! $package->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Health Pacakges END -->
        