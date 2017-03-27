@inject('menuManager','App\Services\MenuManager')

<div id="top-bar" class="modern">
    <div class="container">
        <ul>
            <li>
                <i class="icon-home"></i>
                Jawalakhel, Lalitpur
            </li>
            <li>
                <i class="icon-phone"></i>
                977-1-5523477
            </li>
            <li>
                <i class="icon-envelope"></i>
                info@vargnepal.com
            </li>
        </ul> 
        <div class="header-social">
            <ul>
                <li><a href="#" title=""><i class="icon-google-plus"></i></a></li>
                <li><a href="#" title=""><i class="icon-facebook"></i></a></li>
                <li><a href="#" title=""><i class="icon-skype"></i></a></li>
                <li><a href="#" title=""><i class="icon-linkedin"></i></a></li>
                <li><a href="#" title=""><i class="icon-twitter"></i></a></li>
            </ul>
        </div>
    </div>
</div><!--top bar-->

<header class="header2 sticky">
    <div class="container">
        <div class="logo">
            <a href="#" title=""><img src="{{ asset('assets/frontend/images/vargnepal.png') }}" alt="Logo" /><h1><i>V</i>aRG</h1></a>
        </div><!-- Logo -->
        <nav class="menu">  
            <ul id="menu-navigation">
                @foreach ($menuManager->mymenu() as $key => $menus)
                @if($menus->parent_id === 0)
                    <li @if( Request::path() ===  $menus->slug )class="active"@elseif(Request::path()=="/" && $key===0 )class="active" @endif><a href="{{ $menus->url }}">{{ $menus->name }}</a>
                      <ul class="sub_menu">
                        @foreach ($menuManager->submenu()   as $keys => $smenu)
                          @foreach ($smenu  as $keyss => $submenu)
                            @if($menus->id == $submenu->parent_id)
                                <li><a href="{{ $submenu->url }}">{{ $submenu->name }}</a>
                                    
                                       @foreach ($menuManager->grandmenu()  as $keys => $grandsmenu)
                                       {{dd($menuManager->grandmenu())}}
                                       <ul class="sub_menu">
                                        @foreach ($grandsmenu  as $keyss => $grandsubmenu)
                                          @if($submenu->id == $grandsubmenu->parent_id)
                                           <li>
                                              <a href="{{ $grandsubmenu->url}}">
                                                {{ $grandsubmenu->name }}
                                              </a>

                                             </li>
                                          @endif
                                        @endforeach
                                         </ul>
                                      @endforeach
                                  
                                </li>
                            @endif
                          @endforeach
                        @endforeach
                       </ul>
                    </li>
                @endif 
            @endforeach
          </ul>
        </nav><!-- Menu -->
    </div>      
</header><!--header-->

<div class="responsive-header"> 
    <div class="responsive-topbar">     
        <div class="responsive-topbar-info">
            <ul>
                <li><i class="fa fa-home"></i> Go to Home</li>
                <li><i class="fa fa-phone"></i> 977-1-5523477</li>
                <li><i class="fa fa-envelope"></i> info@vargnepal.com</li>
            </ul>
            <div class="container">
                <div class="responsive-socialbtns">
                    <ul>
                        <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="responsive-logomenu">
        <div class="container">
            <a href="#" title=""><img src="{{ asset('assets/frontend/images/vargnepal.png') }}" alt="Logo" /></a>
            <span class="menu-btn"><i class="fa fa-th-list"></i></span>
        </div>
    </div>
    <div class="responsive-menu">
        <span class="close-btn"><i class="fa fa-close"></i></span>
        <ul>
            @foreach ($menuManager->mymenu() as $key => $menus)
              @if($menus->parent_id === 0)
                <li @if( Request::path() ===  $menus->slug )class="has-dropdown"@elseif(Request::path()=="/" && $key===0 )class="has-dropdown" @endif>
                    <a href="{{$menus->url}}" >{{$menus->name}}</a>     
                    <ul>
                    @foreach ($menuManager->submenu()  as $keys => $smenu)
                        @foreach ($smenu  as $keyss => $submenu)
                            @if($menus->id == $submenu->parent_id)
                                <li class="has-dropdown"><a href="{{ $submenu->url }}">{{ $submenu->name }}</a></li>
                            @endif
                        @endforeach
                    @endforeach
                    </ul>     
                </li>
              @endif
            @endforeach
        </ul>  


        <ul>
          @foreach ($menuManager->mymenu() as $key => $menus)
            @if($menus->parent_id === 0)
                <li @if( Request::path() ===  $menus->slug )class="active"@elseif(Request::path()=="/" && $key===0 )class="active" @endif><a href="{{ $menus->url }}">{{ $menus->name }}</a>
                  <ul class="sub_menu">
                    @foreach ($menuManager->submenu()   as $keys => $smenu)
                      @foreach ($smenu  as $keyss => $submenu)
                        @if($menus->id == $submenu->parent_id)
                            <li><a href="{{ $submenu->url }}">{{ $submenu->name }}</a>
                                <ul style="display: block;">
                                   @foreach ($menuManager->grandmenu()  as $keys => $grandsmenu)
                                    @foreach ($grandsmenu  as $keyss => $grandsubmenu)
                                      @if($submenu->id == $grandsubmenu->parent_id)
                                        <li>
                                          <a href="{{ $grandsubmenu->url}}">
                                            {{ $grandsubmenu->name }}
                                          </a>
                                        </li>
                                      @endif
                                    @endforeach
                                  @endforeach
                               </ul>
                            </li>
                        @endif
                      @endforeach
                    @endforeach
                   </ul>
                </li>
            @endif 
          @endforeach
        </ul>
                  
      
    </div> 
</div><!--Responsive header-->


  


