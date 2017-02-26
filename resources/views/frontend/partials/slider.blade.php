<div id="layerslider-container-fw">

    <div id="layerslider" style="width: 100%; height: 530px; margin: 0px auto; ">
    
    @foreach($slider as $key => $sliders)

       @if(count($sliders) > 0)

          @if(count($images->getImage('Slider',$sliders->id)) > 0 )

                @foreach($image as $images)

                      @if($images->imageable_type === 'Slider' && $images->imageable_id == $sliders->id )
                         @if ($key == 0)
                            <div class="ls-slide" data-ls="transition3d:53; timeshift:-1000;">          
                              <img src="{{ asset($images->path) }}"  class="ls-bg" alt="Slide background">
                                    <h3 class="ls-l slide1" style="top: 203px; left:248px; background: url({{ asset('assets/frontend/images/slider1-img2.png') }}) no-repeat scroll 0 0 / auto 100% transparent; font-family:roboto; font-size:34px; font-weight:bold; color:#4c4c4c; line-height:56px; padding:0 60px 0 60px; ; border-radius:3px;" data-ls="offsetxin:0;offsetyin:bottom;durationin:1000;easingin:easeOutQuad;fadein:false;rotatein:-10;offsetxout:0;durationout:1500;" ><i></i> <span> {{ $sliders->title }}</span></h3>
                                    <span class="ls-l slide1"   style="top: 270px; left:248px; font-family:roboto; font-size:24px; font-weight:600; color:#000; padding:10px 20px 10px 50px; background:rgba(255,255,255,0.9); border-radius:4px 0 0px 4px; border-left:2px solid #93b631; position:relative; line-height:22px; float:left;" data-ls="offsetxin:0;offsetyin:top;durationin:1000;easingin:easeOutQuad;fadein:false;rotatein:10;offsetxout:0;durationout:1500;"><i>{{ $sliders->caption}}</i></span>
                                    <p class="ls-l slide1"  style="top: 330px; left:248px; font-family:roboto; font-size:13px; color:#fefefe;" data-ls="delayin:1000; scalein:4; durationin : 1000;">{{$sliders->subtitle}}</p>
                            </div><!-- Slide1 -->
                          @elseif($key == 1)
                            <div class="ls-slide" data-ls="transition3d:53; timeshift:-1000;">          
                                <img src="{{ asset($images->path) }}" " class="ls-bg" alt="Slide background">
                                    <h3 class="ls-l slide1" style="top: 203px; left:248px; background: url({{ asset('assets/frontend/images/slider1-img2.png') }}) no-repeat scroll 0 0 / auto 100% transparent; font-family:roboto; font-size:34px; font-weight:bold; color:#4c4c4c; line-height:56px; padding:0 60px 0 60px; ; border-radius:3px;" data-ls="offsetxin:0;offsetyin:bottom;durationin:1000;easingin:easeOutQuad;fadein:false;rotatein:-10;offsetxout:0;durationout:1500;" ><i></i> <span>{{ $sliders->title }}</span></h3>
                                    <span class="ls-l slide1"   style="top: 270px; left:248px; font-family:roboto; font-size:24px; font-weight:600; color:#000; padding:10px 20px 10px 50px; background:rgba(255,255,255,0.9); border-radius:4px 0 0px 4px; border-left:2px solid #93b631; position:relative; line-height:22px; float:left;" data-ls="offsetxin:0;offsetyin:top;durationin:1000;easingin:easeOutQuad;fadein:false;rotatein:10;offsetxout:0;durationout:1500;">{{ $sliders->caption}}<i></i></span>
                                    <p class="ls-l slide1"  style="top: 330px; left:248px; font-family:roboto; font-size:13px; color:#fefefe;" data-ls="delayin:1000; scalein:4; durationin : 1000;">{{$sliders->subtitle}}</p>
                            </div><!-- Slide1 -->
                            @elseif($key == 2)
                            <div class="ls-slide" data-ls="transition3d:12;timeshift:-1000;">           
            <img src="{{ asset($images->path) }}"  class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide3" style="top:196px; left:100px; font-family: roboto; color: #FFFFFF; line-height:22px; font-size:32px; background:rgba(0,0,0,0.85); padding:18px 30px; border-radius:3px;" data-ls="offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:top; durationin:1500; durationout:800; showuntil:2000; fadeout:false;"> 
                        <i></i> {{ $sliders->title }}</h3>
                        
                <h4 class="ls-l slide3" style="top:265px; left:100px; background:rgba(152,212,96,0.85); font-family: roboto; color: #FFFFFF; font-size:28px; line-height:26px; padding:10px 20px; border-radius:3px;" data-ls="offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:top; durationin:1500; durationout:800; delayin:500; showuntil:2500;fadeout:false;">
                        {{ $sliders->caption}}<span></span></h4>
            
                <h5 class="ls-l slide3" style="top:319px; left:100px; background:rgba(255,255,255,0.85); color:#595858; font-family:roboto; font-size:24px; line-height: 20px; padding:10px 20px; border-radius:3px;" data-ls="offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:top; durationin:1500; durationout:800; delayin:1000; showuntil:3000;fadeout:false;">
                        {{$sliders->subtitle}} <span></span></h5>
        </div><!-- Slide2 -->
                            @elseif($key == 3)
                            <div class="ls-slide" data-ls="transition3d:35;timeshift:-1000;">           
            <img src="src="{{ asset($images->path) }}"  class="ls-bg" alt="Slide background">
                <h3 class="ls-l" style="top: 160px; left:160px; font-family:roboto; font-size:72px; font-weight:bold; color:#fff; line-height:60px; text-align:center;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:1000;easingin:easeInOutQuart;fadein:false;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:1000;fadeout:false;" ><span>{{ $sliders->title }}</span></h3>
                
                <span class="ls-l slide3-subtitle" style="top: 248px; left:160px; padding:13px; border-radius:3px; color:#fff; font-family:open sans; font-weight:900; font-size:26px; text-transform:uppercase; line-height:20px;" data-ls="offsetxin:0;offsetyin:bottom;durationin:1500;delayin:1200;easingin:easeInOutQuart;fadein:false;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:1000;fadeout:false;"> <i style="font-style:normal; color:#373737;">{{$sliders->caption}}</i></span>

                <span class="ls-l slide3-subtitle2" style="top: 248px; left:750px; background:rgba(0,0,0,0.8); padding:13px; border-radius:3px; color:#fff; font-family:open sans; font-weight:900; font-size:26px; text-transform:uppercase; line-height:20px;" data-ls="offsetxin:0;offsetyin:bottom;durationin:1500;delayin:1300;easingin:easeInOutQuart;fadein:false;scalexin:0;scaleyin:0;offsetxout:0;offsetyout:top;durationout:1000;fadeout:false;"><i style="font-style:normal;"></i> {{$sliders->subtitle}}</span>
        </div><!-- Slide3 -->
                         @endif
                      @endif

              @endforeach                                            

        @endif 

        @else

          <img src="{{ asset('assets/frontend/img/slider_placeholder.png')}}" alt="img-fluid">

        @endif

    @endforeach  



        
        
        

        
        {{-- <div class="ls-slide" data-ls="transition3d:75;timeshift:-1000;">           
            <img src="{{ asset('assets/frontend/images/slider4.jpg') }}" class="ls-bg" alt="Slide background">
            
            <h3 class="ls-l slide4" style="top:180px; left:150px; background:rgba(0,0,0,0.9); font-family:roboto; font-size:36px; font-weight:bold; color:#fefefe; padding:20px 60px 20px; border-radius:4px;" data-ls="offsetxin:bottom;durationin:2000;delayin:1000;easingin:easeInOutQuart;fadein:false;scalexin:100;scaleyin:0;offsetxout:right;durationout:1400;fadeout:false;">
                SAVE THE <i>WORLD</i></h3>

            <span class="ls-l slide4-subtitle" style="top:280px; left:215px;border-radius: 4px 4px 0 0; color: #FFFFFF;font-family: open sans;font-size: 13px;font-weight: bold; padding: 5px 10px;" data-ls="offsetxin:bottom;durationin:2000;delayin:1500;easingin:easeInOutQuart;fadein:false;scalexin:100;scaleyin:0;offsetxout:right;durationout:1400;fadeout:false;">Want To Know Why And How We Do It?</span>
                
            <h4 class="ls-l" style="top:315px; left:120px; color:#030303; font-family:source sans pro; font-size:20px; font-weight:700;" data-ls="offsetxin:bottom;durationin:2000;delayin:2000;easingin:easeInOutQuart;fadein:false;scalexin:100;scaleyin:0;offsetxout:right;durationout:1400;fadeout:false;">OUR CHARITY HELPS THOSE PEOPLE WHO HAVE NO HOPE</h4>
            
            <p class="ls-l" style="top:350px; left:20px; font-family:roboto; font-size:14px; color:#030303;" data-ls="offsetxin:bottom;durationin:2000;delayin:2000;easingin:easeInOutQuart;fadein:false;scalexin:100;scaleyin:0;offsetxout:right;durationout:1400;fadeout:false;">Sed interdum, lacus et vulputate pellentesque, velit nulla commodo sem, at egestas nulla metus.</p>
            
        </div><!-- Slide4 -->

         <div class="ls-slide" data-ls="transition3d:63;timeshift:-1000;">          
            <img src="{{ asset('assets/frontend/images/slider5.jpg') }}" class="ls-bg" alt="Slide background">
            <h3 class="ls-l slide5" style="top:80px; left:670px; font-family:open sans; font-size:36px; font-weight:700; color:#FFF;"  data-ls="offsetxin:0;offsetyin:top;durationin:750;delayin:1000;easingin:easeOutQuart;fadein:false;offsetxout:right;durationout:1000;easingout:easeInQuart;fadeout:false;">Supporting <span>889</span> People</h3>
            <i class="ls-l slide5" style="top:130px; left:760px; font-family:open sans; font-size:20px; color:#FFF;"  data-ls="offsetxin:0;offsetyin:top;durationin:750;delayin:500;easingin:easeOutQuart;fadein:false;offsetxout:right;durationout:1000;easingout:easeInQuart;fadeout:false;">fundraising & charity...</i>
            <h4 class="ls-l slide5-title" style="top:160px; left:560px; font-family:open sans; font-size:70px; font-weight:700; color:#FFF; line-height:55px; padding:50px 80px 80px; background:rgba(0,0,0,0.9);" data-ls="offsetxin:0;offsetyin:0;durationin:1000;delayin:1400;easingin:easeOutQuart;fadein:false;easingout:easeInQuart;rotatexin:-90deg;">OPEN <span>H</span>EART</h4>
            <span class="ls-l" style="top:280px; left:710px; font-family:open sans; font-size:18px; font-weight:400; color:#FFF; letter-spacing:3px;" data-ls="offsetxin:0;offsetyin:0;durationin:1000;delayin:1700;easingin:easeOutQuart;fadein:false;easingout:easeInQuart;rotatexin:-90deg;">DONATE FOR NEEDY PEOPLE</span>
            <a class="ls-l slide-donate" style="top:350px; left:770px; font-family:open sans; font-size:12px; font-weight:400; color:#FFF; padding:10px 20px; border-radius:3px;"  data-ls="offsetxin:0;offsetyin:700;durationin:1000;delayin:2000;easingin:easeOutQuart;fadein:false;easingout:easeInQuart;rotatexin:-90deg;" href="#" title=""><i class="icon-heart"></i> DONATE NOW</a>
        </div><!-- Slide5 -->

        <div class="ls-slide" data-ls="transition3d:63;timeshift:-1000;">           
            <img src="{{ asset('assets/frontend/images/slider6.jpg') }}" class="ls-bg" alt="Slide background">
            <div class="ls-l slide-icon" style="top:70px; left:50%;"  data-ls="scalexin:0;scaleyin:0;durationin:1000;delayin:400;easingin:easeOutQuart;fadein:false;easingout:easeInQuart;rotatein:-800deg;" ><img src="{{ asset('assets/frontend/images/slide6-icon.png') }}" alt="" /></div>
            <h3 class="ls-l" style="top:190px; left:50%; color:#FFF; font-family:open sans; font-size:60px; font-weight:300;" data-ls="durationin:1500; delayin:1000; easingin:easeOutQuart; fadein:false; easingout:easeInQuart; rotatexin:-90deg;">LET'S BUILD <span style="font-weight:700;">THE WORLD.</span></h3>
            <p class="ls-l" style="top:290px; left:50%; line-height:30px; color:#FFF; font-family:noto sans; font-size:14px; text-align:center;" data-ls="durationin:1500; delayin:1500; easingin:easeOutQuart; fadein:false; easingout:easeInQuart; rotatexin:-90deg;">With easy to use Drag and Drop Page Builder build professional looking page with best slider <br />Layer. Lorem ipsum dolor sit amet, consectetur</p>
            <div class="ls-l slide-donate2" style="top:370px; left:50%; font-family:open sans; font-size:12px; font-weight:400; color:#FFF; padding:10px 20px; border-radius:3px;" data-ls="durationin:1500; delayin:2000; easingin:easeOutQuart; fadein:false; easingout:easeInQuart; rotatexin:-90deg;"><a href="#" title=""><i class="icon-heart"></i> DONATE NOW</a></div>
        </div> --}}

        
    </div>
</div><!-- Layer Slider -->  