@inject('menuManager','App\Services\MenuManager')
 <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-widget-title">
                    <h4><strong><span>A</span>bout</strong> VaRG</h4>
                </div>
                <div class="footer_carousel">
                    <div class="review">
                        <i>L</i><p><span>ifeline</span> is clean and modern responsive Template built with HTML5 & CSS3 coding and easy to use Shortcodes with load of features in it. We have implemented many features in this theme which makes your project easier and better than before and can be used for multipurpose. </p>
                    </div>                      
                </div>
            </div><!-- Reviews Widget -->
            <div class="col-md-3">
                <div class="footer-widget-title">
                    <h4><strong><span>C</span>ontact</strong> Us</h4>
                </div>
                <ul class="contact-details">
                    <li>
                        <span><i class="icon-home"></i>ADDRESS</span>
                        <p>#8901 Marmora Road Chi Minh City, Vietnam</p>
                    </li>
                    <li>
                        <span><i class="icon-phone-sign"></i>PHONE NO</span>
                        <p>+00 035 835 282 / +00 034 965 353</p>
                    </li>
                    <li>
                        <span><i class="icon-envelope-alt"></i>EMAIL ID</span>
                        <p>#8901 Marmora Road Chi Minh City, Vietnam</p>
                    </li>
                    <li>
                        <span><i class="icon-link"></i>WEB ADDRESS</span>
                        <p>http://www.yourwebsite.com</p>
                    </li>
                </ul>
            </div><!-- Contact Us Widget -->
            <div class="col-md-3">
                <div class="footer-widget-title">
                    <h4><strong><span>S</span>ite</strong> Map</h4>
                </div>
                <ul class="contact-details">
                 @foreach ($menuManager->mymenu() as $key => $menus)
                    @if($menus->parent_id === 0)
                    <li><a href="{{$menus->url}}" title=""><em>{{$menus->name}}</em></a></li>
                    @endif
                @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <div class="newsletter">
                    <h4><strong>SIGNUP</strong> NEWSLETTER</h4>
                    <p>Get to Know Us More.</p>
                    <input class="form-control" type="email" placeholder="Email" />
                </div>
                <ul class="social-bar">
                    <li><a href="#" title=""><img src="{{ asset('assets/frontend/images/facebook.jpg') }}" alt="" /></a></li>
                    <li><a href="#" title=""><img src="{{ asset('assets/frontend/images/gplus.jpg') }}" alt="" /></a></li>
                    <li><a href="#" title=""><img src="{{ asset('assets/frontend/images/linked-in.jpg') }}" alt="" /></a></li>
                    <li><a href="#" title=""><img src="{{ asset('assets/frontend/images/rss.jpg') }}" alt="" /></a></li>               
                </ul>
                <div class="newsletter-btn">
                    <input type="button" value="Submit" />
                </div>
            </div>  <!-- News Letter SignUp -->     
        </div>
    </div>
</footer><!-- Footer -->


<div class="footer-bottom">
    <div class="container ">
        <div class="col-sm-4 col-sm-offset-5 text-left"><p>Copyright © 2017 VaRG. <span>All rights reserved.</span> </p><div>x  
    </div>
</div><!-- Bottom Footer Strip -->