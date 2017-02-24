{{ Form::model($slider, [ 'route' => [ 'admin::slidersetting.update', $slider->id ], 'id' => 'page_edit_form', 'method' => 'put', 'files'=> 'true' ]) }}
<input type="hidden" name="view" value="frontend/departments/index" />
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">

                    <div class="md-card-content">
                        <h3 class="heading_b uk-margin-bottom">
                            {{ $title }}
                            <div class="uk-float-right">
                                <a href="{{ route('admin::slidersetting.index') }}" class="md-btn md-btn-primary">all Slider List</a>
                            </div>
                        </h3>
                         <div class="md-card" style="margin-top:20px; margin-bottom: 20px;">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                 Select  Slider Image
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-grid" data-uk-grid-margin="10">
                                    <div class="uk-width-1-1">
                                        @if(isset($slider) && ! is_null($slider->image))
                                            <input type="file" name="image" id="image_file" class="dropify" data-default-file="{{ asset($slider->image->thumbnail(260,198)) }}" />
                                        @else
                                            <input type="file" name="image" id="image_file" class="dropify" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid="{gutter:24}">
                                <div class="uk-width-1-1">
                                    <label>Title</label>
                                    {{ Form::text( 'title', old('title'), [ 'id' => 'page_title', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                                <div class="uk-width-1-1">
                                    <label>Slug</label>
                                    {{ Form::text( 'slug', old('slug'), [ 'id' => 'title', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                                <div class="uk-width-1-1">
                                    <label>Caption</label>
                                    {{ Form::text( 'caption', old('caption'), [ 'id' => 'sub_title', 'class' => 'md-input', 'required' ] ) }}
                                </div>      
                                <div class="uk-width-1-1">
                                    <label>Url</label>
                                    {{ Form::text( 'url', old('url'), [ 'id' => 'sub_title', 'class' => 'md-input', 'required' ] ) }}
                                </div>  
                                <div class="uk-width-1-1">
                                    <label>Subtitle</label>
                                    {{ Form::text( 'subtitle', old('subtitle'), [ 'id' => 'sub_title', 'class' => 'md-input', 'required' ] ) }}
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="uk-width-large-3-10">
        <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_c uk-margin-medium-bottom">Actions</h3>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div class="uk-form-row">
                            {{ Form::checkbox('status', 1, old('status'), [ 'id' => 'page_is_published', 'data-switchery' ] ) }}
                            <label for="page_is_published" class="inline-label">Publish</label>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-form-row uk-float-right">
                            <button type="submit" class="md-btn md-btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Custom Design:</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-mediumuk-width-large">
                        <label for="animation">Animation</label>
                            <select id="animation" name="animation" data-md-selectize>
                                <option value="">Select...</option>
                                <option value="fadeInDown_slide">Fade In Down</option>
                                <option value="fadeInLeft_slide">Fade In Left</option>
                                <option value="fadeInRight_slide">Fade In Right</option>
                                <option value="fadeInUp_slide">Fade In Up</option>
                                <option value="zoomOutUp_slide">Zoom Out Up</option>
                                <option value="rotateInDownLeft_slide">Rotate In Down Left</option>
                                <option value="rotateInDownRight_slide">Rotate In Down Right</option>
                                <option value="slideInUp_slide">Slide In Up</option>
                                <option value="slideInDown_slide">Slide In Down</option>
                                <option value="slideInLeft_slide">Slide In Left</option>
                                <option value="slideInRight_slide">Slide In Right</option>
                                <option value="zoomIn_slide">Zoom In</option>
                          
                            </select>
                        </div>
                        
                    </div>
                     <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-mediumuk-width-large">
                        <label for="caption_positon">Caption Position</label>
                            <select id="caption_positon" name="caption_position" data-md-selectize>
                                <option value="">Select...</option>
                                <option value="caption_right">Right</option>
                                <option value="caption_left">Left</option>
                                <option value="caption_center">Center</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
        </div>
        {{ Form::close() }}
        
    </div>
</div>
