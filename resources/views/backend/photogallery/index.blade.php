
@extends('backend.layout')
@push('styles')

@endpush
@push('scripts')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="{{ asset('assets/backend/js/fileinput.min.js') }}"></script>


@endpush
@section('title', 'Photo Gallery')

@section('content') 
@include('backend.partials.errors')
    <div id="page_content">
   
            <div id="page_content_inner">
                <h3 class="heading_b uk-margin-bottom">Albums</h3>
                <em>Upload Multiple Images for Album: </em><strong>{{$albumid->title}}</strong>
                 {{ Form::open([ 'route' => 'admin::gallerysetting.store', 'class' => 'uk-form-stacked', 'id' => 'post_create_form', 'files' => 'true' ]) }}
                    <label class="control-label"></label>
                    <input id="input-24" name="images[]" type="file" multiple class="file-loading">
                    <input type="hidden" name="albumid" value="{{ $albumid->id }}">
                    
            {{ Form::close() }}
                
            <br>
            <h3 class="heading_b uk-margin-bottom">
               Gallery Images</h3>
            </h3>
            <div class="uk-grid uk-grid-width-small-1-3" data-uk-grid-margin>
             @foreach($image as $images)
                <div style="margin-bottom: 10px;">
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content truncate-text">
                             <img class="card-img-top" src="{{ url('/') }}/{{$images->path}}">
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                 <a class="item_delete" href="{{ url('/') }}/admin/gallerysetting/{{$albumid->slug}}/{{$images->id}}" data-uk-tooltip="{pos:'left'}" title="Delete Photo"><i class="material-icons md-24" onclick="return confirm('Are you sure?')">&#xE872;</i>Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@stop

@push('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- the main fileinput plugin file -->
<script src="{{ asset('assets/backend/js/fileinput.min.js') }}"></script>
<!-- bootstrap.js below is needed if you wish to zoom and view file content 
     in a larger detailed modal dialog -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {


        $("#input-24").fileinput({
    maxFileSize: 500
});


        
    });
</script>
@endpush
