<?php


/**
 * Blog
 */
get('/', function () {
    return redirect('/blog');
});
get('blog', 'BlogController@index');
get('blog/{slug}', 'BlogController@showPost');

/**
 * Admin area
 */
get('admin', function () {
    return redirect('/admin/post');
});

$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
    ], function () {
    resource('admin/post', 'PostController');
    resource('admin/tag', 'TagController', ['except' => 'show']);
    get('admin/upload', 'UploadController@index');
});

/**
 *  Login Logout
 */
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login','Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');