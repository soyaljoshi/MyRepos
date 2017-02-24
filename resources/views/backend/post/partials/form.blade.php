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
                                <a href="{{ route('admin::post.index') }}" class="md-btn md-btn-primary">all posts & activities</a>
                                @if(isset($post))
                                    <a href="{{ route('admin::post.create') }}" class="md-btn md-btn-primary">new post</a>
                                @endif
                            </div>
                        </h3>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid="{gutter:24}">
                                <div class="uk-width-1-1">
                                    <label>Title</label>
                                    {{ Form::text( 'title', old('title'), [ 'id' => 'page_title', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                                <div class="uk-width-1-1">
                                    <label for="post_published_at" class="uk-form-label">Publish date</label>
                                    {{ Form::text('published_at', old('published_at'), ['class'=>'datetimepicker', 'id' => 'post_published_at']) }}
                                </div>
                                 <div class="uk-width-1-1">
                                    <label for="post_Expired_at" class="uk-form-label">Expiry date</label>
                                    {{ Form::text('expired_at', old('expired_at'), ['class'=>'datetimepicker', 'id' => 'post_published_at']) }}
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label>Meta Description</label>
                            {{ Form::textarea( 'meta_description', old('meta_description'), [ 'id' => 'page_meta_description', 'class' => 'md-input', 'cols' => '30', 'rows' => '4' ] ) }}
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
                            Content
                        </h3>
                    </div>
                    <div class="md-card-content">
                        {{ Form::textarea( 'content', old('content'), [ 'id' => 'wysiwyg_tinymce', 'class' => 'md-input', 'cols' => '30', 'rows' => '20' ] ) }}
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
                            {{ Form::checkbox('is_draft', 1, old('is_draft'), [ 'id' => 'post_is_published', 'data-switchery' ] ) }}
                            <label for="post_is_published" class="inline-label">Publish</label>
                        </div>
                    </div>
                    {{-- is_file --}}
                        <div class="uk-width-medium-1-2" id="file-switch" @if(isset($post)) @if($tags[0]== "publication") hidden @endif @endif>
                            <div class="uk-form-row">
                                {{ Form::checkbox('is_file', 1, old('is_file'), [ 'id' => 'post_is_file', 'data-switchery' ] ) }}
                                <label for="post_is_published" class="inline-label">File</label>
                            </div>
                        </div>
                    <div class="uk-width-medium-1-2" style="margin-top: 5px !important;">
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
                    
                        @if(isset($post) && ! is_null($post->image))
                            @if($post->is_file == 1)
                                <input type="file" name="image" id="image_file" class="dropify" data-default-file="{{$post->image->path}}" />
                                <h3 class="md-card-toolbar-heading-text">File name</h3> <br>
                                <p><a href="#">{{$post->image->name}}</a></p>
                            @else
                             <input type="file" name="image" id="image_file" class="dropify" data-default-file="{{ asset($post->image->thumbnail(260,198)) }}" />
                            @endif
                        @else
                            <input type="file" name="image" id="image_file" class="dropify" />
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Category
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin="10">
                    <div class="uk-width-1-1">
                        <label for="tags" class="uk-form-label">Select a category</label>
                        <select name="tags[]" id="tags" class="selectpicker" >
                            @foreach ($allTags as $tag)
                                <option  @if (isset($tags) && in_array($tag, $tags)) selected @endif value="{{ $tag }}">{{ ucfirst($tag) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
