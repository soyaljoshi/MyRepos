<section class="breadcrumb_area">
	{{-- @if(isset($images))
		<ul class="uk-slideshow" data-uk-slideshow="{autoplay:true, animation:'scale', height: '400px'}">
			@foreach($images as $image)
				<li><img src="{{ asset($image->thumbnail(1280,300)) }}"></li>
			@endforeach
		</ul>
	@endif --}}
    <h1 class="uk-position-cover uk-flex uk-flex-middle uk-flex-center">{{ strtoupper($title) }}</h1>
</section>