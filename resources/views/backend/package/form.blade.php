@include('backend.partials.errors')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_b uk-margin-bottom">
        
                            <div class="uk-float-right">
                                <a href="{{ route('admin::packages.index') }}" class="md-btn md-btn-primary">All Packages</a>
                            </div>
                        </h3>
                        <div class="uk-form-row">
                             <div class="uk-width-1-1">
                                <label>Name</label>
                                {{ Form::text( 'title', old('title'), [ 'id' => 'customer_name', 'class' => 'md-input', 'required' ] ) }}
                             </div>
                        </div>
                        <div class="uk-form-row">
                             <div class="uk-width-1-1">
                                <label>Slug</label>
                                {{ Form::text( 'slug', old('slug'), [ 'id' => 'customer_name', 'class' => 'md-input', 'required' ] ) }}
                             </div>
                        </div>
                        <div class="uk-width-1-1">
                            <label for="icon" class="uk-form-label">Icon</label>
                            <div class="class="uk-width-6-10"" style="width: 78% !important;display: inline-block;">
                            <select name="icon" id="icon" class="selectpicker" multiple style="text-transform: capitalize;" >
                                    <option value="flaticon-lifeline5" @if(isset($package) && $package->icon == "flaticon-lifeline5") selected @endif >flaticon-lifeline5</option>
                                    <option value="flaticon-science110" @if(isset($package) && $package->icon == "flaticon-science110") selected @endif >flaticon-science110</option>
                                    <option value="flaticon-healthclinic6" @if(isset($package) && $package->icon == "flaticon-healthclinic6") selected @endif >flaticon-healthclinic6</option>
                                    <option value="flaticon-pharmacy2" @if(isset($package) && $package->icon == "flaticon-pharmacy2") selected @endif >flaticon-pharmacy2</option>
                                    <option value="flaticon-halloween250" @if(isset($package) && $package->icon == "flaticon-halloween250") selected @endif >flaticon-halloween250</option>
                                    <option value="flaticon-teeth1" @if(isset($package) && $package->icon == "flaticon-teeth1") selected @endif >flaticon-teeth1</option>


                            </select>
                            </div>
                            <div class="uk-width-2-10 icon-block" style="float: right;display: inline-block;">
                            <i id="icon-display" class= @if(isset($package))"{{$package->icon}}" @endif></i>
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
                        {{ Form::textarea( 'description', old('description'), [ 'id' => 'wysiwyg_tinymce', 'class' => 'md-input', 'cols' => '30', 'rows' => '20' ] ) }}
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
                            {{ Form::checkbox('status', 1, old('status'), [ 'id' => 'package_is_active', 'data-switchery' ] ) }}
                            <label for="package_is_active" class="inline-label">Active</label>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
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
                        @if(isset($package) && ! is_null($package->image))
                        <input type="file" name="image" id="image_file" class="dropify" data-default-file="{{ asset($package->image->thumbnail(260,198)) }}" />  
                        @else
                            <input type="file" name="image" id="image_file" class="dropify" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
