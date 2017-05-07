@extends('frontend.layouts.master')

@section('title', 'VaRG | Contact Us')

@section('header')
    
@stop

@section('body')

<div class="top-image">
  <img src="{{ asset('assets/frontend/images/pageheader.png') }}" alt="" />
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
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.5249094751453!2d85.30912031506124!3d27.670166982807306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDQwJzEyLjYiTiA4NcKwMTgnNDAuNyJF!5e0!3m2!1sen!2s!4v1488165273783" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
              <span><i class="icon-envelope-alt"></i>EMAIL ID</span>
              <p>varg@wlink.com.np</p>
            </li>
            <li>
              <span><i class="icon-link"></i>WEB ADDRESS</span>
              <p>www.vargnepal.com</p>
            </li>
          </ul>
        </div>
      </div>  <!-- Contact Info -->
      <div class="col-md-6">
        <div id="message"></div>
        <div class="form">
          <h3 class="sub-head">CONTACT US BY MESSAGE</h3>
          <p><em>Send us your queries and feedbacks </em><span>*</span></p>
          <form method="post"  action="#" name="contactform" id="contactform">
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