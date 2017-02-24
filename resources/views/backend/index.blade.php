@extends('backend.layout')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <!-- <h3 class="heading_b uk-margin-bottom">Dashboard</h3> -->
           
            <h3 class="heading_b uk-margin-bottom">Getting Started</h3>
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-margin-large-bottom hierarchical_show" data-uk-grid="{gutter: 20}">
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>Change website information, website default contacts from the
                                "Settings" tab on the sidebar or by clicking the button below.</p>
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('admin::setting') }}">
                                Settings
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>Add new items to menu from the
                                <span class="uk-text-primary">menu</span>
                                tab on the sidebar. Example: Departments, Publication,etc.
                            </p>
                       
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('admin::menu') }}">
                                Menu
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>Create new pages such as FAQ, Help, etc from the pages tab on the sidebar or by clicking
                                the button below.</p>
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('admin::page.create') }}">
                                Pages
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop