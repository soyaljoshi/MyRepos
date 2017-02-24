@extends('frontend.layouts.master')

@section('title', 'VaRG | Contact Us')

@section('header')
    
@stop

@section('body')

<div class="top-image">
  <img src="{{ asset('assets/frontend/images/single-page-top3.jpg') }}" alt="" />
</div><!-- Page Top Image -->
  
<section class="inner-page">
  <div class="container">
    <div class="page-title">
      <h1>Contact <span>Us</span></h1>
    </div><!-- Page Title -->
    <div class="row">
      <div class="col-md-6">
        <div class="contact-info">
          <h3 class="sub-head">CONTACT INFORMATION</h3>
          <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=australia&amp;aq=&amp;sll=-25.274398,133.775136&amp;sspn=41.490127,85.166016&amp;ie=UTF8&amp;hq=&amp;hnear=Australia&amp;t=m&amp;z=4&amp;ll=-25.274398,133.775136&amp;output=embed"></iframe>
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
        </div>
      </div>  <!-- Contact Info -->
      <div class="col-md-6">
        <div id="message"></div>
        <div class="form">
          <h3 class="sub-head">CONTACT US BY MESSAGE</h3>
          <p><em>Send us your queries and feedbacks </em><span>*</span></p>
          <form method="post"  action="contact.php" name="contactform" id="contactform">
            <label for="name" accesskey="U">Full name <span>*</span></label>
            <input name="name" class="form-control input-field" type="text" id="name" size="30" value="" />
            <label for="email" accesskey="E">Email Address <span>*</span></label>
            
            <input name="email" class="form-control input-field" type="text" id="email" size="30" value="" />
            <label for="comments" accesskey="C">Message <span>*</span></label>
            <textarea name="comments" rows="9" id="comments" rows="7" class="form-control input-field"></textarea>

            <input type="submit" class="form-button submit" id="submit" value="SEND MESSAGE" />
          </form>
          <div class="g-recaptcha" data-sitekey="6Lfp2yETAAAAAJpa6Hjx8XXb5lCk8zLzFlxNOlxe"></div>
        </div>
      </div>  <!-- Message Form -->
    </div>  
  </div>
</section>
@stop


@push('script')

       <script src='https://www.google.com/recaptcha/api.js'></script>
@endpush