<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Post;
use App\Category;
use App\Tag;


Route::get('/', 'PortalController@index')->name('welcome');

Route::get('/portal/{post}', 'PortalController@detailedPage')->name('post.detail');

Route::get('/portal/category/{category}', 'PortalController@categoryPosts')->name('category.posts');

Route::get('/portal/tag/{tag}', 'PortalController@tagPosts')->name('tag.posts');




Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    //POST ROUTES

    Route::get('/post/create', 'PostsController@create')->name('post.create')->middleware('verifyCategoriesCount');

    Route::resource('posts', 'PostsController');
    
    Route::post('/post/store', 'PostsController@store')-> name('post.store');

    Route::get('/posts/{post}', 'PostsController@edit')->name('posts.edit');

    Route::put('/post/update/{id}', 'PostsController@update')->name('post.update');

    Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy');

    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-post.index');

    Route::put('/post/restore/{id}', 'PostsController@restore')->name('post.restore');

    // Route::get('/post/destroy/{id}', 'PostsController@permDelete')->name('post.destroy');
    

    //TAG ROUTES   
    Route::get('/tags', 'TagsController@index')->name('tags');
    
    Route::get('/tag/create', 'TagsController@create')->name('tag.create');

    Route::post('/tag/store', 'TagsController@store')-> name('tag.store');

    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');

    Route::post('/tag/update', 'TagsController@update')->name('tag.update');
 
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');  


    //USERS ROUTES 
    Route::get('/users/profile', 'UsersController@edit')->name('users.edit-profile');

    Route::put('/users/profile', 'UsersController@update')->name('users.update-profile');

 
});

Route::group([
    'prefix'     => 'admin',
    'middleware' => [
        'auth',
        'verifyIsAdmin',
    ],
], function() {
    //ADMIN USERS ROUTES   
    Route::resource('users', 'UsersController');

    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');

    Route::post('users/{user}/revoke-admin', 'UsersController@revokeAdmin')->name('users.revoke-admin');

    //CATEGORY ROUTES     
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');

    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');

    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');

    Route::get('/categories', 'CategoriesController@index')->name('categories');  

    Route::post('/category/store', 'CategoriesController@store')->name('category.store');

    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
});


// Route::get('/test', function(){
//     return App\Tag::find(5)->posts;
// });  

View::composer(['layouts.app'], function($view){
    $trashed = Post::onlyTrashed()->get();

    $view->with('trashed', $trashed);
});

View::composer(['layouts.portal'], function($view){
    $categories = Category::all();
    $tags = Tag::all();

    $view->with('categories', $categories)->with('tags', $tags);
});



