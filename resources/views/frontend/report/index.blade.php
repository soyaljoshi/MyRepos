@extends('frontend.layouts.master')

@section('title', 'NPHL :: Report')



@section('body')
<div class="container">
   <ol class="breadcrumb" style="background: none;">
        <li>
         <i class="fa fa-home"></i>
            <a href="/">Home</a>
        </li>

      <li>Report</li>
        
    </ol>
</div>
<div style="background-color: #d9e4ea;">
<div class="container">
	<div class="row" style="margin-left: 65px;">
		{{-- <div class="col-md-2">
			<img src="{{ asset('assets/frontend/img/siderbar_image.jpg')}}" alt="">
		</div> --}}
		<div class="col-md-12">

		<iframe height="1150px" width="1000px" src="http://www.midas.com.np/hospital/patient_report_detail.php" style="border:none;background:none;margin-bottom: 10px;"></iframe>
			
		</div>
		
	</div>

</div>
</div>
@stop