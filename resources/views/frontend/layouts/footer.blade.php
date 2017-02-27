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
                        <i>V</i><p><span>aRG</span> was established as an independent and private organization in 1986. It was with this firm conviction that Valley Research Group Private Limited (VaRG) was established by like-minded professional researchers to contribute to the developmental process of the country.</p>
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
                        <p>Jawalakhel, Lalitpur</p>
                    </li>
                    <li>
                        <span><i class="icon-phone-sign"></i>PHONE NO</span>
                        <p>977-1-5523477</p>
                    </li>
                    <li>
                        <span><i class="icon-envelope-alt"></i>FAX NO</span>
                        <p>977-1-5528147</p>
                    </li>
                    <li>
                        <span><i class="icon-envelope-alt"></i>EMAIL ID</span>
                        <p>info@vargnepal.com</p>
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