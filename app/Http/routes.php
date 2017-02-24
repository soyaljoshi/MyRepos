<?php

/*
|--------------------------------------------------------------------------
| Logging In/Out Routes
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('admin/login', 'AdminAuth\AuthController@showLoginForm');
Route::post('admin/login', 'AdminAuth\AuthController@login');
Route::get('admin/logout', 'AdminAuth\AuthController@logout');

Route::get('register', 'Auth\AuthController@showLoginForm');
Route::post('register', 'Auth\AuthController@store');

/*
|--------------------------------------------------------------------------
| Password reset link request routes
|--------------------------------------------------------------------------
*/
Route::post('password/email', 'Auth\PasswordController@postEmail');

/*
|--------------------------------------------------------------------------
| Password reset routes
|--------------------------------------------------------------------------
*/
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/


Route::get('contact-us','Frontend\PagesController@contact')->name('contact-us');
Route::get('about','Frontend\PagesController@about')->name('about');
Route::get('archieve','Frontend\PagesController@archieved')->name('archieved');
Route::get('photogallery','Frontend\PagesController@photogallery')->name('photogallery');
Route::get('photogallery/detail/{album_id}','Frontend\PagesController@photogallerydetail');
Route::get('stafflist/{slug}','Frontend\PagesController@stafflist')->name('stafflist');
Route::get('stafflist','Frontend\PagesController@stafflist')->name('stafflist');

Route::get('patient_report_central.php','Frontend\PagesController@report')->name('report');

//route search 
Route::get('/search','Frontend\PagesController@search')->name('search');

Route::get('/', 'Frontend\FrontController@index');

Route::get('/post', 'Frontend\FrontController@postIndex')->name('post::index');
Route::get('/post/{post}', 'Frontend\FrontController@post')->name('post::show');
Route::get('/activities/{post}', 'Frontend\FrontController@post')->name('activities::show');

Route::get('/department/{slug}', 'Frontend\FrontController@departments')->name('departments::show');

Route::get('/page/{page_slug}', 'Frontend\FrontController@page')->name('page::show');

Route::group(['namespace' => 'Frontend', 'prefix' => 'contact', 'as' => 'contact::'], function ()
{
    Route::get('/', 'ContactController@index')->name('index');
    Route::post('feedback', 'ContactController@store')->name('feedback');
});

Route::get('publication','Frontend\PagesController@publication')->name('publication');
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

$router->group([
    'namespace'  => 'Frontend',
    'middleware' => 'auth',
    'prefix'     => 'user',
    'as'         => 'user::'
], function ()
{
    /*
    |--------------------------------------------------------------------------
    | Frontend User Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/', function ()
    {
        return redirect('user/dashboard');
    });
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('edit', 'UserController@edit')->name('edit');
    Route::put('update', 'UserController@update')->name('update');
    Route::put('change/{user_slug}/password', 'UserController@changePassword')->name('changePassword');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', function ()
{
    return redirect('/admin/dashboard');
});

$router->group([
    'namespace'  => 'Backend',
    'middleware' => 'admin',
    'prefix'     => 'admin',
    'as'         => 'admin::'
], function ()
{
    /*
    |--------------------------------------------------------------------------
    | Various Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingController@index')->name('setting');
    Route::put('settings', 'SettingController@update')->name('setting.update');
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::put('menu', 'MenuController@update')->name('menu.update');





    // Route::get('departments','DepartmentController@index')->name('departments');

    /*
    |--------------------------------------------------------------------------
    | Admin User CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'user.'], function ()
    {
        Route::get('user', 'AdminController@index')->name('index');
        Route::post('user', 'AdminController@store')->name('store');
        Route::post('user/update', 'AdminController@update')->name('update');
        Route::post('user/delete', 'AdminController@destroy')->name('destroy');
        Route::get('user/{admin_slug}', 'AdminController@show')->name('show');
        Route::put('user/{admin_slug}', 'AdminController@updateProfile')->name('profile.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Post Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'post', 'as' => 'post.'], function ()
    {
        Route::get('/', 'PostController@index')->name('index');
        Route::get('create', 'PostController@create')->name('create');
        Route::post('/', 'PostController@store')->name('store');
        Route::get('{post}/edit', 'PostController@edit')->name('edit');
        Route::put('{post}', 'PostController@update')->name('update');
        Route::delete('{post}', 'PostController@destroy')->name('destroy');
    });

    
    /*
    |--------------------------------------------------------------------------
    | Page Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'page', 'as' => 'page.'], function ()
    {
        Route::get('/', 'PageController@index')->name('index');
        Route::get('create', 'PageController@create')->name('create');
        Route::post('/', 'PageController@store')->name('store');
        Route::get('{page_slug}/edit', 'PageController@edit')->name('edit');
        Route::put('{page_slug}', 'PageController@update')->name('update');
        Route::delete('{page_slug}', 'PageController@destroy')->name('destroy');
    });

     /*
    |--------------------------------------------------------------------------
    | Newly added routes::
    |--------------------------------------------------------------------------
    */

    // Departments Management

    Route::group(['prefix' => 'departments', 'as' => 'departments.'], function ()
    {
        Route::get('/', 'DepartmentController@index')->name('index');
        Route::get('create', 'DepartmentController@create')->name('create');
        Route::post('/', 'DepartmentController@store')->name('store');
        Route::get('{department_slug}/edit', 'DepartmentController@edit')->name('edit');
        Route::put('{department_slug}', 'DepartmentController@update')->name('update');
        Route::delete('{department_slug}', 'DepartmentController@destroy')->name('destroy');

        
    });

    // StaffManagement Routes

    Route::group(['prefix' => 'staffmanagement', 'as' => 'staffmanagement.'], function ()
    {
        Route::get('/', 'StaffmanagementController@index')->name('index');
        Route::get('create', 'StaffmanagementController@create')->name('create');
        Route::post('/', 'StaffmanagementController@store')->name('store');
        Route::get('{sf_id}/edit', 'StaffmanagementController@edit')->name('edit');
        Route::put('{sf_id}', 'StaffmanagementController@update')->name('update');
        Route::delete('{sf_id}', 'StaffmanagementController@destroy')->name('destroy');

        
    });

    //Home Setting Routes

    Route::group(['prefix' => 'homesectionsetting', 'as' => 'homesectionsetting.'], function ()
    {
        Route::get('/', 'HomesectionsettingController@index')->name('index');
        Route::get('create', 'HomesectionsettingController@create')->name('create');
        Route::post('/', 'HomesectionsettingController@store')->name('store');
        Route::get('{hs_id}/edit', 'HomesectionsettingController@edit')->name('edit');
        Route::put('{hs_id}', 'HomesectionsettingController@update')->name('update');
        Route::delete('{hs_id}', 'HomesectionsettingController@destroy')->name('destroy');

    });
// Slider setting routes

    Route::group(['prefix' => 'slidersetting', 'as' => 'slidersetting.'], function ()
    {
        Route::get('/', 'SlidersettingController@index')->name('index');
        // Route::get('create', 'SlidersettingController@create')->name('create');
        Route::post('/', 'SlidersettingController@store')->name('store');
        Route::get('{hs_id}/edit', 'SlidersettingController@edit')->name('edit');
        Route::put('{hs_id}', 'SlidersettingController@update')->name('update');
        Route::delete('{hs_id}', 'SlidersettingController@destroy')->name('destroy');

    });

      //Packages Routes

    Route::group(['prefix' => 'packages', 'as' => 'packages.'], function ()
    {
        Route::get('/', 'PackageController@index')->name('index');
        Route::get('create', 'PackageController@create')->name('create');
        Route::post('/', 'PackageController@store')->name('store');
        Route::get('{package}/edit', 'PackageController@edit')->name('edit');
        Route::put('{package}', 'PackageController@update')->name('update');
        Route::delete('{package}', 'PackageController@destroy')->name('destroy');

    });

    //technologies Routes
     Route::group(['prefix' => 'populartest', 'as' => 'populartest.'], function ()
    {
        Route::get('/', 'PopularController@index')->name('index');
        Route::get('create', 'PopularController@create')->name('create');
        Route::post('/', 'PopularController@store')->name('store');
        Route::get('{popular_id}/edit', 'PopularController@edit')->name('edit');
        Route::put('{popular_id}', 'PopularController@update')->name('update');
        Route::delete('{popular_id}', 'PopularController@destroy')->name('destroy');

    });

 Route::group(['prefix' => 'albumsetting', 'as' => 'albumsetting.'], function ()
    {
        Route::get('/', 'AlbumController@index')->name('index');
        Route::get('create', 'AlbumController@create')->name('create');
        Route::post('/', 'AlbumController@store')->name('store');
        Route::get('{album_slug}/edit', 'AlbumController@edit')->name('edit');
        Route::put('{album_slug}', 'AlbumController@update')->name('update');
        Route::delete('{album_slug}', 'AlbumController@destroy')->name('destroy');

    });

 Route::group(['prefix' => 'gallerysetting', 'as' => 'gallerysetting.'], function ()
    {
        Route::get('/', 'PhotogalleryController@index')->name('index');
        Route::get('{gallery_slug}/create', 'PhotogalleryController@create')->name('create');
        Route::post('/', 'PhotogalleryController@store')->name('store');
        Route::get('{gallery_slug}/edit', 'PhotogalleryController@edit')->name('edit');
        Route::put('{gallery_slug}', 'PhotogalleryController@update')->name('update');
        Route::delete('{gallery_slug}', 'PhotogalleryController@destroy')->name('destroy');

    });



 /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

 
    /*
    |--------------------------------------------------------------------------
    | Contact CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function ()
    {
        Route::get('/', 'ContactController@index')->name('index');
        Route::post('/', 'ContactController@store')->name('store');
        Route::post('update', 'ContactController@update')->name('update');
        Route::post('delete', 'ContactController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Asset Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'upload'], function ()
    {
        Route::get('/', 'UploadController@index');
        Route::post('file', 'UploadController@uploadFile');
        Route::delete('file', 'UploadController@deleteFile');
        Route::post('folder', 'UploadController@createFolder');
        Route::delete('folder', 'UploadController@deleteFolder');
    });
});

$router->group([
    'namespace'  => 'Backend',
    'middleware' => 'admin',
    'prefix'     => 'api',
    'as'         => 'admin::'
], function ()
{
    Route::get('file', 'UploadController@fileList')->name('file.list');
    Route::post('pin', 'PinController@pinList')->name('pin.list');
    Route::post('admin-user', 'AdminController@adminList')->name('user.list');
    Route::post('contact', 'ContactController@contactList')->name('contact.list');
    Route::post('contact-type', 'ContactController@contactTypeList')->name('contact.type.list');
    Route::post('post', 'PostController@postList')->name('post.list');
    Route::post('order', 'OrderController@orderList')->name('order.list');
    Route::post('customer', 'CustomerController@customerList')->name('customer.list');
});
