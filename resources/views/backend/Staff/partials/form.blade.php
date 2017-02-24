@include('backend.partials.errors')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_b uk-margin-bottom">
                            {{ $title }}
                            <div class="uk-float-right">
                                <a href="{{ route('admin::staffmanagement.index') }}" class="md-btn md-btn-primary">All staff</a>
                                @if(isset($post))
                                    <a href="{{ route('admin::staffmanagement.create') }}" class="md-btn md-btn-primary">new staff </a>
                                @endif
                            </div>
                        </h3>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid="{gutter:24}">
                                <div class="uk-width-1-1">
                                    <label>Name</label>
                                    {{ Form::text( 'name', old('name'), [ 'id' => 'page_title', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                                <div class="uk-width-1-1">
                                    <label>Designation</label>
                                    {{ Form::text( 'designation', old('designation'), [ 'id' => 'designation', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                                  <div class="uk-width-1-1">
                                    <label>Slug</label>
                                    {{ Form::text( 'slug', old('slug'), [ 'id' => 'slug', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                                <div class="uk-width-1-1">
                                    <label>Hierarchy</label>
                                    {{ Form::number( 'order', old('order'), [ 'id' => 'slug', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                               {{--  <div class="uk-width-1-1">
                                    <label for="tags" class="uk-form-label">Select a Department</label>
                                    <select name="department" id="tags" class="selectpicker" multiple style="text-transform: capitalize;">
                                        @foreach ($department as $key => $tag)
                                            <option @if (isset($tags) && in_array($key, $tags)) selected @endif value="{{ $key }}">{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                </div>
 --}}
                                <div class="uk-width-1-1">
                                    <label for="tags" class="uk-form-label">Select a Division</label>
                                    <select name="division" id="tags" class="selectpicker" multiple style="text-transform: capitalize;">
                                        @foreach ($division as $key => $tag)
                                            <option @if (isset($tags) && in_array($key, $tags)) selected @endif value="{{ $key }}">{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions">
                            <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                            <i class="md-icon material-icons md-card-toggle">&#xE316;</i>
                        </div>
                        <h3 class="md-card-toolbar-heading-text">
                           Description
                        </h3>
                    </div>
                    <div class="md-card-content">
                        {{ Form::textarea( 'desc', old('desc'), [ 'id' => 'wysiwyg_tinymce', 'class' => 'md-input', 'cols' => '30', 'rows' => '20' ] ) }}
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
                            {{ Form::checkbox('status', 1, old('status'), [ 'id' => 'post_is_published', 'data-switchery' ] ) }}
                            <label for="post_is_published" class="inline-label">Publish</label>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-form-row" style="padding-left: 0;">
                            {{ Form::checkbox('view_photo', 1, old('view_photo'), [ 'id' => 'page_is_published', 'data-switchery' ] ) }}
                            <label for="page_is_published" class="inline-label">View Photo</label>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row" style="padding-left: 0;">
                            {{ Form::checkbox('view_professional', 1, old('view_professional'), [ 'id' => 'page_is_published', 'data-switchery' ] ) }}
                            <label for="page_is_published" class="inline-label">View As Professional</label>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row uk-float-right">
                            <button type="submit" class="md-btn md-btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Featured Image
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin="10">
                    <div class="uk-width-1-1">
                        @if(isset($plan) && ! is_null($plan->image))
                            <input type="file" name="image" id="image_file" class="dropify" data-default-file="{{ asset($plan->image->thumbnail(260,198)) }}" />
                        @else
                            <input type="file" name="image" id="image_file" class="dropify" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>